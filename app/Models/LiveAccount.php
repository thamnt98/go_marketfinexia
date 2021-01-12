<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveAccount extends Model
{
    protected $fillable = [
        'user_id',
        'group',
        'leverage',
        'login',
        'phone_number'
    ];
}
