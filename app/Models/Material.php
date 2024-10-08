<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    // Especifica la tabla si el nombre no sigue la convención plural
    protected $table = 'materiales';

    // Especifica los campos que son asignables en masa
    protected $fillable = [
        'nombre_material',
        'descripcion',
        'unidad_medida',
        'cantidad_presupuestada',
        'cantidad_actual',
        'precio_unitario_presupuestado',
        'precio_real',
        'estado_cuadro',
        'estado_pedido',
        'estado_devengado',
        'prioridad',
    ];
}
