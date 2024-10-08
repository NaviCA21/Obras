<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CrearRegistroRequest extends FormRequest
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
            'herramientas' => ['nullable', 'array'],
            'herramientas.*.nombreHerramienta' => ['required', 'string'],
            'dni' => ['required', 'string', 'max:8', Rule::unique('registros', 'idControl')->ignore($this->registro)],
            'visitante' => ['required', 'string', 'max:255'],
            'sexo' => ['boolean'],
            'entidad' => ['required', 'string'],
            'motivo' => ['string'],
            'observacion' => ['nullable','string'],
            'usuario_id' =>['required', 'integer'],
            'img_path' => ['string']
        ];
    }
}
