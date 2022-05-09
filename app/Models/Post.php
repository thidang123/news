<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'post_author',
        'post_title',
        'post_desc',
        'post_id',
        'post_image_path'
    ];
}
