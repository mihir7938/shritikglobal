<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class LoginRequest.
 */
class LoginRequest extends Request
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

    public function attributes()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required|max:16',
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
