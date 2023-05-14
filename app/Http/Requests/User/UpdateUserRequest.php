<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'first_name' => 'sometimes|required|string|min:3|max:200',
            'last_name' => 'sometimes|required|string|min:3|max:200',
            'email' => 'sometimes|required|email',
            'password' => 'nullable|confirmed',
            'role' => 'sometimes|required|in:client,admin',
            'active' => 'sometimes|required|in:yes,no',
            'username' => 'sometimes|required|string|min:3|max:200',
            'phone' => 'sometimes|required|digits:10',
            'image' => 'nullable|image',
           // 'location' => 'sometimes|required',
        ];
    }
}
