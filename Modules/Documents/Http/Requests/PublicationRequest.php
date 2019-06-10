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
            'type'  => 'bail|required|string|max:255',
            'title'  => 'bail|required|string|max:255',
            'publisher' => 'bail|required|string|max:255',
            'country' => 'bail|required|string|max:255',
            'editorial' => 'bail|required|string|max:255',
            'description' => 'bail|required|string|max:355',
            'document' => 'bail|required|file|mimes:doc,pdf|max:10000'
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
