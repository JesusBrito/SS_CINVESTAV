<?php


namespace Modules\Documents\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class PublicationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type'  => 'bail|required|string',
            'title'  => 'bail|required|string',
            'publisher' => 'bail|required|string',
            'country' => 'bail|required|string',
            'editorial' => 'bail|required|string',
            'description' => 'bail|required|string',
            'document' => 'bail|string'
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
