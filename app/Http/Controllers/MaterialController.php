<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MaterialController extends Controller
{
    public function index()
    {
        $materiales = Material::all();

        return Inertia::render('MaterialesRelacion', [
            'materiales' => $materiales
        ]);
    }

    public function create()
    {
        return Inertia::render('MaterialesCreate');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_material' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'unidad_medida' => 'required|string|max:255',
            'cantidad_presupuestada' => 'required|numeric',
            'cantidad_actual' => 'required|numeric',
            'precio_unitario_presupuestado' => 'required|numeric',
            'precio_real' => 'nullable|numeric',
            'estado_cuadro' => 'required|in:pendiente,incluido',
            'estado_pedido' => 'required|in:no solicitado,en proceso,pedido',
            'estado_devengado' => 'required|in:no devengado,devengado',
            'prioridad' => 'required|in:alta,media,baja',
        ]);

        Material::create($validated);

        return redirect()->route('materiales.index')->with('success', 'Material creado exitosamente.');
    }

    public function show(Material $material)
    {
        return Inertia::render('MaterialesShow', [
            'material' => $material
        ]);
    }

    public function edit(Material $material)
    {
        return Inertia::render('MaterialesEdit', [
            'material' => $material
        ]);
    }

    public function update(Request $request, Material $material)
    {
        $validated = $request->validate([
            'nombre_material' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'unidad_medida' => 'required|string|max:255',
            'cantidad_presupuestada' => 'required|numeric',
            'cantidad_actual' => 'required|numeric',
            'precio_unitario_presupuestado' => 'required|numeric',
            'precio_real' => 'nullable|numeric',
            'estado_cuadro' => 'required|in:pendiente,incluido',
            'estado_pedido' => 'required|in:no solicitado,en proceso,pedido',
            'estado_devengado' => 'required|in:no devengado,devengado',
            'prioridad' => 'required|in:alta,media,baja',
        ]);

        $material->update($validated);

        return redirect()->route('materiales.index')->with('success', 'Material actualizado exitosamente.');
    }

    public function destroy(Material $material)
    {
        $material->delete();

        return redirect()->route('materiales.index')->with('success', 'Material eliminado exitosamente.');
    }
}

