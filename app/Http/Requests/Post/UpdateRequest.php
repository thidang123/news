<?php

namespace App\Http\Requests\Post;

use App\Models\Post;
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
            'post_title'=> [
                'bail',
                'required',
                'string',
            ],
            'post_author'=>[
                'bail',
                'required',
                'string',
            ],
            'post_desc'=>[],
            'post_image_path'=>[],
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
            'post_title'=>'Title',
            'post_author'=>'The author',
            'post_desc'=>'Post Describe Details',
        ];
    }
}
