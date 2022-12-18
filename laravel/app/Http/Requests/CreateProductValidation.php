<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductValidation extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'model' => 'required',
        'country' => 'required',
        'company' => 'required',
        'date' => 'required|numeric',
        'photo' => 'required|file|max:2040|image',
        'price' => 'required|numeric',
        'category_id' => 'required',
        ];
    }
}
