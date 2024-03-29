<?php

namespace App\Http\Requests\Admin\Tag;

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
            'title' => 'required|unique:tags|string'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле не обходимо для заполнения',
            'title.unique' => 'Тег с таким названием уже существует',
            'title.string' => 'Название должно быть строкового типа',
        ];
    }
}
