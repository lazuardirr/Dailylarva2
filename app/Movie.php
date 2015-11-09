<?php

namespace App;

use App\lib\ContentGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

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

    public function setDescription(ContentGenerator $content)
    {
        $this->description = Crypt::encrypt($content->getDescription());
    }

    public function setThumbnail(ContentGenerator $content)
    {
        $this->thumbnail = $content->getThumbnail();
    }

    public function filters()
    {
        return $this->belongsToMany('App\Filter')->withTimestamps();
    }
}
