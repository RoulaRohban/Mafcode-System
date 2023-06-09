<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|min:3|max:1000',
            'price' => 'required|numeric|min:0',
            'taxable' => 'boolean',
            'active' => 'required|in:yes,no',
            'image' => 'required|image',
        ];
    }
}
