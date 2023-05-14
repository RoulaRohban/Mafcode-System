<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'active' => 'sometimes|required|in:yes,no',
            'has_id' => 'sometimes|required|in:yes,no',
            'parent_id' => 'sometimes|nullable|exists:categories,id',
        ];
    }
}
