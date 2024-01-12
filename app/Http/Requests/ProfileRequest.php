<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // すべてのユーザーがこのフォームリクエストを使用できるように設定
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // バリデーションルールを定義
        return [
            'name' => 'required|max:255',         // 名前は必須かつ最大255文字
            'gender' => 'required|max:255',       // 性別は必須かつ最大255文字
            'hobby' => 'nullable|max:255',        // 趣味は任意項目で最大255文字
            'introduction' => 'nullable|max:1000' // 自己紹介欄は任意項目で最大1000文字
        ];
    }
}