<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function generatePDF($idControl)
    {
        $users = User::get();

        $registro = Registro::with('usuario', 'herramientas')->find($idControl);

        $data = [
            'title' => 'Reporte de Visita MPP',
            'date' => date('m/d/Y'),
            'users' => $users,
            'registro' => $registro,
        ];

        // Obtén la ruta completa de la imagen
        $imagePath = public_path($registro->img_path);

        $pdf = PDF::loadView('myPDF', $data);
        $pdf->getDomPDF()->set_option('isRemoteEnabled', true);

        $html = view('myPDF', $data)->with(['imagePath' => $imagePath])->render();
        $pdf->loadHTML($html);

        return $pdf->download('reporte.pdf');
    }
}
