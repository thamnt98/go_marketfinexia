<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'password',
        'phone_number',
        'application_type',
        'family_name'
    ];
}
