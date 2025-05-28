<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEvent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:100',
            'start_date' => 'required|date|after_or_equal:today',
        ];
    }

    /**
     * リクエストのnameなどの値を再定義するメソッド
     *
     * @return array<string>
     */
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'start_date' => '開始日',
        ];
    }

    /**
     * FormRequestクラス単位でエラーメッセージを定義するメソッド
     *
     * @return array<string>
     */
    public function messages()
    {
        return [
            'start_date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
        ];
    }
}
