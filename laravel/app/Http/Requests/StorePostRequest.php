<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ];
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
