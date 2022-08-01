<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => 'required|unique:posts',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'array|nullable',
            'tag_ids.*' => 'integer|nullable|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле не обходимо для заполнения',
            'title.unique' => 'Пост с таким названием уже существует',
            'title.string' => 'Название должно быть строкового типа',
            'content.required' => 'Поле не обходимо для заполнения',
            'content.string' => 'Контент должен быть строкового типа',
            'preview_image.file' => 'Необходимо выбрать файл',
            'main_image.file' => 'Необходимо выбрать файл',
            'category_id.required' => 'Поле необходимо для заполнения',
            'category_id.integer' => 'Передаваемое значение должно быть числом',
            'tag_ids.array' => 'Необходимо передать массив',
        ];
    }
}
