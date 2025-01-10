<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvatarPurchase extends Model
{
    protected $fillable = [
        'AvatarID',
        'FriendID'
    ];
    
    public function avatar(){
        return $this->belongsTo(Avatar::class, 'id', 'id');
    }

    public function user(){
        return $this->belongsTo(Friends::class, 'id', 'id');
    }
}
