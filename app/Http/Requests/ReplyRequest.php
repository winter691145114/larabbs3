<?php

namespace App\Http\Requests;

class ReplyRequest extends Request
{
    public function rules()
    {
        return [
            'content' => 'required|min:3',
        ];



    }

    public function messages()
    {
        return [
            'content.min' => '回复内容不少于3个字符。',
        ];
    }
}
