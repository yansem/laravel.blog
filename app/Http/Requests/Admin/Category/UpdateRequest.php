<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'required|unique:categories,deleted_at,NULL|string'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле не обходимо для заполнения',
            'title.unique' => 'Категория с таким именем уже существует',
            'title.string' => 'Название должно быть строкового типа',
        ];
    }
}
