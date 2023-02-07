<?php

namespace App\Http\Requests\Post;

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
            'title' => 'required|string',  //параметры значения поля =>'required|string' не дадут сохранить с пустым значением, будет выведена ошибка после добавления в представление @error, можно выбрать другие параметры
            'content' => 'required|string',
            'description' => 'required|string',
            'image' => '',
            'category_id' => 'required|string',
            'tags' => '',
        ];
    }
}
