<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['task', 'status'];

    /**
     * a Task may have many sub Tasks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subTask()
    {
        return $this->hasMany('App\SubTask');
    }
}
