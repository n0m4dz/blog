<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //posts
    protected $table = 'post';

    protected $fillable = [
    	'title', 'content', 'thumb', 'user_id'
    ];

    function comments(){
   		return $this->hasMany('App\Comment');
   	}

   	function user(){
   		return $this->belongsTo('App\User');
   	}
}
