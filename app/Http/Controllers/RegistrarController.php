<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CrearRegistroRequest;
use App\Http\Resources\RegistroResource;
use App\Models\Herramienta;
use App\Models\Registro;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class RegistrarController extends Controller
{

    public function index(Request $request): Response
    {
        return Inertia::render('Registrar/Registrar', [
            'registros' => RegistroResource::collection(
                Registro::query()
                    ->with('herramientas') // Cargar ansiosamente las relaciones de herramientas
                    ->when($request->input('buscar'), function ($query, $buscar) {
                        $query->where('visitante', 'like', "%{$buscar}%");
                    })
                    ->whereNull('updated_at')
                    ->whereHas('usuario', function ($query) use ($request) {
                        $query->where('oficina_id', $request->user()->oficina_id);
                    })
                    ->orderBy('created_at', 'desc')
                    ->paginate(10)
                    ->withQueryString()
            ),
            'filters' => $request->only(['buscar'])
        ]);
    }

    public function create(string $dni): Response
    {
        if (!ctype_digit($dni) || strlen($dni) !== 8) {
            return Inertia::render('Registrar/Crear', [
                'error' => 'Formato incorrecto de DNI',
            ]);
        }
        $visitante = Http::withoutVerifying()->get('https://api.apis.net.pe/v1/dni?numero=', [
            'numero' => $dni
        ]);
        $visitanteArray = $visitante->json();
        if  (is_null($visitanteArray) || (isset($visitanteArray['error']) && $visitanteArray['error'] === 'Invalid dni')) {
            return Inertia::render('Registrar/Crear', [
                'error' => 'No se encontró el DNI ingresado',
            ]);
        }
        return Inertia::render('Registrar/Crear', [
            'visitanteArray' => $visitanteArray,
            'dni' => $dni,
            'success' => 'Se encontró el DNI ingresado',
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CrearRegistroRequest $request): RedirectResponse
    {

        // Recibe y procesa los datos de la imagen
        $imageData = $request->input('img_path');
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageData = base64_decode($imageData);

        // // Cambia el tamaño de la imagen
        // $img = Image::make($imageData)->resize(640, 480);

        $fileName = 'image-' . time() . '.png';
        Storage::disk('public')->put($fileName, $imageData);
        $imgPath = Storage::url($fileName);

        $registro = Registro::create(array_merge(
            $request->validated(),
            ['updated_at' => null, 'img_path' => $imgPath]
        ));

        $herramientas = $request->input('herramientas');
        foreach ($herramientas as $herramienta) {
            // Crear una nueva instancia del modelo Herramienta
            $herramientaModel = new Herramienta;
            $herramientaModel->nombreHerramienta = $herramienta['nombreHerramienta'];
            $herramientaModel->marca = $herramienta['marca'];
            $herramientaModel->serie = $herramienta['serie'];
            // ...
            $herramientaModel->save();

            Log::debug('Modelo Herramienta:', ['herramienta' => $herramientaModel]);

            // Guardar la relación entre la herramienta y el registro en la tabla control_herramienta
            DB::table('control_herramienta')->insert([
                'control_id' => $registro->idControl,
                'herramienta_id' => $herramientaModel->idHerramienta,
            ]);
        }

        return to_route('registrar.index');
    }

    public function imagen(Request $request){
         // Recibe y procesa los datos de la imagen
        $imageData = $request->input('imageData');
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageData = base64_decode($imageData);
        $fileName = 'image-' . time() . '.png';
        Storage::disk('public')->put($fileName, $imageData);
        $imgPath = Storage::url($fileName);

        // Almacena la ruta del archivo de imagen en la sesión del usuario
        session(['img_path' => $imgPath]);

        return response()->json(['success' => true]);
    }

    public function update(string $id): RedirectResponse
    {
        DB::table('registros')
        ->where('idControl', $id)
        ->update(['updated_at' => now()]);

        return back();
    }

}
