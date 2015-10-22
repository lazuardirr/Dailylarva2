<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = [
        'email',
        'email_password',
        'dailymotion_password'
    ];
}
