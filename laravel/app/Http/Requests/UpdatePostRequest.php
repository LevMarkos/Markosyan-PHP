<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return config('validation.update_post');
    }

    public function messages()
    {
        return [
            'title.required' => 'Название поста обязательно для заполнения.',
            'content.required' => 'Содержание поста обязательно для заполнения.',
        ];
    }
}


