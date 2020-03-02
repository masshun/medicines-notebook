<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ValidateTestRequest extends FormRequest
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
            'name' => 'bail|required|max:255',
            'image' => 'bail|image|max:1000',
            'term' => 'max:255',
            'quantity' => 'max:255',
            'body' => 'max:255',
        ];
    }


    public function withValidator(Validator $validator) {
        $validator->after(function ($validator) {
            $user = \App\User::where('name', $this->input('name'))->first();

            // 同名ユーザが存在して、ログイン中ユーザと同ユーザであればエラー
            if(null !== $user && $this->user()->id === $user->id){
                $validator->errors()->add('name', '既にログインしています。');
            }
        });
    }
}
