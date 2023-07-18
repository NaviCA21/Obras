<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model
{
    use HasFactory;

    protected $primaryKey = 'idHerramienta';

    public $timestamps = false;

    protected $fillable = ['nombreHerramienta' ,
        'marca',
        'serie',
        'img_path'
    ];

    public function registros()
    {
        return $this->belongsToMany(Registro::class, 'control_herramienta', 'herramienta_id', 'control_id');
    }


}
