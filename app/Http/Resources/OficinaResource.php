<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OficinaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idOficina' => $this->idOficina,
            'nombreOficina' => $this->nombreOficina,
            'created_at' => $this->created_at ? $this->created_at->toFormattedDateString() : null,
        ];
    }
}
