<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{
    protected $table = 'sub_tasks';

    protected $fillable = ['sub_task'];

    /**
     * A sub task is owned by a task.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
