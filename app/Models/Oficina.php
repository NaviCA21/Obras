<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $primaryKey = 'idOficina'; // Definir la clave primaria

    protected $fillable = ['idOficina','nombreOficina']; // Definir las columnas que se pueden llenar

    public $timestamps = true; // Indicar si la tabla tiene las columnas "created_at" y "updated_at"

    public function usuarios(){
        return $this->hasMany(User::class, 'oficina_id', 'idOficina');
    }
}
