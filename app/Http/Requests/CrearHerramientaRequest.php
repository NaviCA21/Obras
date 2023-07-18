<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearHerramientaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombreHerramienta' => 'required|string|max:255',
            'marca' => 'nullable|string|max:255',
            'serie' => 'nullable|string|max:255',
            'img_path' => 'nullable|string|max:255',
        ];
    }

}
