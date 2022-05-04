<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Boolean;
use function Symfony\Component\Console\Style\table;

class StoreRequest extends FormRequest
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

            'user_name'=>[
                'bail',
                'required',
                'string',
               // Rule::unique(table('users'))->ignore($this->user->id),
                'user_name' => 'unique:App\Models\User,user_name'

            ],
            'password'=>[
                'bail',
                'required',
                'string',
            ],
            'email'=>[
                'bail',
                'required',
                'string',
                'email' => 'unique:App\Models\User,email'
            ],
            'avatar'=>[
                'nullable'
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
          'password'=>'Password',
          'email'=>'Email',
        ];
    }
}
