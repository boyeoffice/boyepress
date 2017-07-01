<?php

namespace Boye\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
               'name' => 'required|max:100',
              'username' => 'required|unique:users',
              'email' => 'required|email|unique:users',
              'is_admin' => 'required|bool',
              'roles' => 'required|integer',
              'status' => 'required|bool',
              'password' => 'required',
        ];
    }
}
