<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DevLog extends Model
{
    protected $table = 'dev_logs';

    public function addLog($title, $user_id, $content)
    {
        $this->title = $title;
        $this->user_id = $user_id;

        if (is_array($content)) {
            $this->content = implode('<br>', $content);
        } else {
            $this->content = $content;
        }
        return $this;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
