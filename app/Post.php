<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'content',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}