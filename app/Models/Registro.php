<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $primaryKey = 'idControl';

    protected $fillable = [
        'dni',
        'visitante',
        'entidad',
        'motivo',
        'observacion',
        'img_path',
        'nombre_usuario',
        'usuario_id',
        'created_at',
        'updated_at',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function herramientas()
    {
        return $this->belongsToMany(Herramienta::class, 'control_herramienta', 'control_id', 'herramienta_id');
    }
}
