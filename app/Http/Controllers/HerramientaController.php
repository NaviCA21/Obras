<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearHerramientaRequest;
use App\Http\Resources\HerramientaResource;
use App\Models\Herramienta;
use App\Models\Registro;
use Illuminate\Http\Request;

class HerramientaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CrearHerramientaRequest $request, Registro $registro)
{
    $herramienta = Herramienta::create($request->validated());

    $registro->herramientas()->attach($herramienta);

    return new HerramientaResource($herramienta);
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
