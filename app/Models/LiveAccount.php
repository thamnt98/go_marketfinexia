<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiveAccount extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'group',
        'leverage',
        'login',
        'phone_number',
        'ib_id',
        'is_staff'
    ];
}
