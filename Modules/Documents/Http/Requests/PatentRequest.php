<?php

namespace Modules\Documents\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $uniqueCondition = $this->route('patent') // verifica si existe el parámetro en la url
                                ? ",nombre,{$this->route('patent')->id},id"
                                : '';

        $requiredCondition = $this->route('patent') // verifica si existe el parámetro en la url
                                    ? 'nullable'
                                    : 'required';

        return [
            'nombre' => "bail|required|string|unique:patents{$uniqueCondition}",
            'pais' => 'bail|required|string',
            'fecha_solicitud' => 'bail|required|date|before:fecha_registro',
            'fecha_registro' => 'bail|required|date|after:fecha_solicitud|before:fecha_expiracion',
            'fecha_expiracion' => 'bail|required|date|after:fecha_registro',
            'numero' => 'bail|required|string',
            'descripcion' => 'bail|required|string',
            'documento' => "bail|{$requiredCondition}|file|mimes:pdf",
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
