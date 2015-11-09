<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    public function movies()
    {
        return $this->belongsToMany('App\Movie')->withTimestamps();
    }
}
