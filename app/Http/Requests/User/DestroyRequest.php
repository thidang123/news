<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Boolean;

class DestroyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user'=>[
                'required',
                Rule::exists(User::class,'id')
            ],
        ];
    }
    protected function prepareForValidation()
    {

    }
}
