<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CrearOficinaRequest;
use App\Http\Resources\OficinaResource;
use App\Models\Oficina;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class OficinaController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Oficinas/Oficinas', [
            'oficinas' => OficinaResource::collection(Oficina::all()),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Oficinas/Crear');
    }

    public function store(CrearOficinaRequest $request): RedirectResponse
    {
        Oficina::create(['nombreOficina' => $request->nombreOficina]);
        return to_route('oficinas.index');
    }

    public function edit(Oficina $oficina): Response
    {
        return Inertia::render('Admin/Oficinas/Editar', [
            'oficina' => new OficinaResource($oficina)
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(CrearOficinaRequest $request, Oficina $oficina): RedirectResponse
    {
        dd($request->all());
        $oficina->update($request->validated());
        return to_route('oficinas.index');
    }

    public function destroy(Oficina $oficina): RedirectResponse
    {
        $oficina->delete();
        return to_route('oficinas.index');
    }
}
