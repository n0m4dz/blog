<?php

namespace App\Http\Controllers\orm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    function index(){
    	$comments = Comment::with('post.user')->get();
    	dump($comments);
    	foreach($comments as $c){
    		dump($c->post->user);
    	}
    }
}
