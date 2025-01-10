<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    protected $table = "friends";

    protected $fillable = [
        'ProfilePicture',
        'LinkInstagram',
        'Username',
        'Password',
        'Gender',
        'Hobbies',
        'MobileNumber',
        'Coins',
    ];
}
