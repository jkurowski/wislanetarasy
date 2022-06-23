<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MapFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:5|max:100',
            'lat' => 'required',
            'lng' => 'required',
            'zoom' => 'required|integer',
            'address' => 'required|string'
        ];
    }
}
