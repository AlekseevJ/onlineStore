<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required',
            'name'=> 'required',
            'price'=> 'required',
            
            
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'name is requer.',
            'price.required'  => 'input digit price',
            'color' => 'choose name of color, or select color id',
        ];
    }
}
