<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
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
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:80',
        ];
    }

    // 自定义表单的提示信息
    public function messages()
    {
        return [
            'name.unique' => 'The username is already taken, please re-fill.',
            'name.regex' => 'Only letters, numbers, dashes, and underscores.',
            'name.between' => 'The username must be between 3 and 25 characters.',
            'name.required' => 'The username cannot be empty.',
        ];
    }
}
