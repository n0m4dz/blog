<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
   	function comments(){
   		$this->hasMany('App\Comment');
   	}
}
