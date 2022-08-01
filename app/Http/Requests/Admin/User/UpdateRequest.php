<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,' . $this->user->id,
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
            'email.email' => 'Неверный формат email',
        ];
    }
}
