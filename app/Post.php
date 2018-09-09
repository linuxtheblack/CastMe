<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
  protected $fillable = [
    'user_id',
    'title',
    'content',
    'banner',
    'images',
<<<<<<< HEAD
    'roles',
=======
    'actor',
    'dancer',
    'entertainer',
    'event_staff',
    'extra',
    'model',
    'musician',
>>>>>>> c80ddde4beece099c25273232d4fe99e672dc1df
  ];

  public function comments() {
    return $this->hasMany('App\Comment', 'post_id');
  }

  public function owner() {
    return $this->belongsTo('App\User', 'user_id');
  }
}
