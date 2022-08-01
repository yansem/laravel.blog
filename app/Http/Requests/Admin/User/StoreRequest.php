<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|unique:users|string',
            'email' => 'required|unique:users|email',
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле необходимо для заполнения',
            'name.unique' => 'Пользователь с таким именем уже существует',
            'name.string' => 'Поле должно быть строкового типа',
            'email.required' => 'Поле необходимо для заполнения',
            'email.unique' => 'Пользователь с таким email уже существует',
            'email.string' => 'Поле должно быть строкового типа',
            'role.required' => 'Поле необходимо для заполнения',
            'role.integer' => 'Передаваемое значение должно быть числом',
        ];
    }
}
