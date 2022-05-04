<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'first_name'=> [
                'bail',
                'required',
                'string',
            ],
            'last_name'=>[
                'bail',
                'required',
                'string',
            ],

            'user_name'=> [
                'bail',
                'required',
                'string',
                 Rule::unique(User::class)->ignore($this->user),

            ],
            'email'=>[
                'bail',
                'required',
                'string',
                Rule::unique(User::class)->ignore($this->user),
            ],
        ];
    }

    public function messages(){
        return [
            'required'=>'You have to fill :attribute',
        ];
    }

    public function attributes()
    {
        return [
            'first_name'=>'First Name',
            'last_name'=>'Last Name',
            'user_name'=>'Username',
            'email'=>'Email',
        ];
    }
}
