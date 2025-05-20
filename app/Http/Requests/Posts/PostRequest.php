<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return config('validation.store_post');
    }

    public function messages()
    {
        return [
            'title.required' => 'Название поста обязательно для заполнения.',
            'content.required' => 'Содержание поста обязательно для заполнения.',
            'image.image' => 'Файл должен быть изображением.',
            'image.mimes' => 'Допустимые форматы изображений: jpeg, png, jpg, gif.',
            'image.max' => 'Размер изображения не должен превышать 2 МБ.',
        ];
    }
}
