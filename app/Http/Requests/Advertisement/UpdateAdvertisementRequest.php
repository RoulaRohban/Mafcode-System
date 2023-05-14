<?php

namespace App\Http\Requests\Advertisement;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdvertisementRequest extends FormRequest
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
            'user_id' => 'sometimes|required|exists:users,id',
            'category_id' => 'sometimes|required|exists:categories,id',
            'type' => 'sometimes|required|in:lost,found,need',
            'active' => 'sometimes|required|in:yes,no',
            'status' => 'sometimes|required|in:not_found,found',
            'title' => 'sometimes|required|string|min:3|max:200',
            'description' => 'sometimes|required|min:3|max:1000',
            'country_id' => 'sometimes|required|exists:countries,id',
            'city_id' => 'nullable|exists:cities,id',
            'region_id' => 'nullable|exists:regions,id',
            'image' => 'nullable|image',
        ];
    }
}
