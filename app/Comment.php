<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $table = 'comments';

	protected $fillable = [
    	'comment', 'post_id'
    ];

    function post(){
    	return $this->belongsTo('App\Post');
    }
}
