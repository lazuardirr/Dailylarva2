<?php

namespace App;

use App\lib\ContentGenerator;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'id',
        'title',
        'tags',
        'genre',
        'channel',
        'country',
        'language',
    ];

    public function setDescription()
    {
        $data = new ContentGenerator($this->id);
        $this->description = $data->getDescription();
    }

    public function setThumbnail()
    {
        $data = new ContentGenerator($this->id);
        $this->thumbnail = $data->getThumbnail();
    }
}
