<?php

namespace App\Http\Requests\Post;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class DestroyRequest extends FormRequest{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'post'=>[
                'required',
                Rule::exists(Post::class,'id')
            ],
        ];
    }
    protected function prepareForValidation()
    {

    }
}
