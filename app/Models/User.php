<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'last_name',
        'user_name',
        'password',
        'email',
        'avatar',
    ];


}
