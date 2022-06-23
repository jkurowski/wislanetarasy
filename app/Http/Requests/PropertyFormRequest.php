<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'investment_id' => $this->route('investment')->id
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'investment_id' => 'required',
            'status' => 'required',
            'name' => 'required|string|max:255',
            'name_list' => 'string|max:255',
            'number' => 'required|string|max:255',
            'number_order' => 'integer',
            'rooms' => 'required|integer',
            'area' => '',
            'garden_area' => '',
            'balcony_area' => '',
            'terrace_area' => '',
            'loggia_area' => '',
            'parking_space' => '',
            'garage' => '',
            'price' => '',
            'cords' => '',
            'html' => '',
            'meta_title' => '',
            'meta_description' => ''
        ];
    }
}
