<?php

namespace App\Http\Resources;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class RegistroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        setlocale(LC_TIME, 'Spanish_Spain', 'es_ES', 'es'); // Establecer la localización en español        Carbon::setLocale('es'); // Establecer la localización en español
        App::setLocale('es'); // Establecer la localización en español

        $usuarioId = $this->usuario_id;
        $nombreUsuario = $this->usuario ? $this->usuario->name : $this->nombre_usuario;

        return [
            'idControl' => $this->idControl,
            'dni' => $this->dni,
            'visitante' => $this->visitante,
            'sexo' => $this->sexo,
            'entidad' => $this->entidad,
            'motivo' => $this->motivo,
            'observacion' => $this->observacion,
            'img_path' => $this->img_path,
            'nombre_usuario' => $nombreUsuario ?: $usuarioId,
            'created_at' => optional($this->created_at)->format('d/m/Y H:i:s'),
            'updated_at' => optional($this->updated_at)->format('d/m/Y H:i:s'),
            'herramientas' => HerramientaResource::collection($this->herramientas), // Incluir las herramientas relacionadas
        ];
    }
}
