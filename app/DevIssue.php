<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DevIssue extends Model
{
    protected $table = 'dev_issues';

    protected $fillable = [
        'issue',
        'detail',
        'level',
    ];
}
