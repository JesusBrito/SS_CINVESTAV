<?php

namespace Modules\Documents\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $uniqueCondition = $this->route('group') // verifica si existe el parámetro en la url
                                ? ",nombre,{$this->route('group')->id},id"
                                : '';

        return [
            'nombre' => "bail|required|string|unique:groups{$uniqueCondition}",
            'descripcion' => 'bail|required|string',
            'id_profesor' => 'bail|nullable|integer|exists:users,id',
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
