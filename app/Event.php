<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    protected $fillable = [
        'title',
        'content',
        'date',
        'image',
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(Admin::class);
    }
}
