<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HerramientaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'idHerramienta' => $this->idHerramienta,
            'nombreHerramienta' => $this->nombreHerramienta,
            'marca' => $this->marca,
            'serie' => $this->serie,
            'img_path' => $this->img_path,
            // ...
        ];
    }
}
