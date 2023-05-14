<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'sometimes|required|string',
            'description' => 'sometimes|required|min:3|max:1000',
            'price' => 'sometimes|required|numeric|min:0',
            'taxable' => 'sometimes|required|boolean',
            'active' => 'sometimes|required|in:yes,no',
        ];
    }
}
