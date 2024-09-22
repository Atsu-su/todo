<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoFormRequest extends FormRequest
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
            'name' => 'required|string|max:10',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'カテゴリー名を入力してください',
            'content.string' => 'カテゴリー名は文字列で入力してください',
            'content.max' => 'カテゴリー名は10文字以内で入力してください',
        ];
    }
}
