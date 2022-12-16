<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'content' => 'required',
            'due_date' => 'required'
        ];
    }

    public function messages() {
        return [
            'content.required' => 'メモは必須項目です。',
            'due_date.required' => '期限は必須項目です。'
        ];
    }
}
