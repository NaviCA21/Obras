<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegistroResource;
use App\Models\Registro;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        return Inertia::render('Registros/Registros', [
            'registros' => RegistroResource::collection(
                Registro::query()
                    ->with('herramientas') // Cargar ansiosamente las relaciones de herramientas
                    ->when($request->input('buscar'), function ($query, $buscar) {
                        $query->where('visitante', 'like', "%{$buscar}%");
                    })
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

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Registros/Reportes', [
            'registros' => RegistroResource::collection(Registro::all()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
