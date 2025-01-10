<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Friends extends Authenticatable
{

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

    public function getAuthPassword()
    {
        return $this->Password;
    }

}
