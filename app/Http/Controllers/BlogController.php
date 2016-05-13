<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    function __construct(){

    }

    function getList(Request $request){
       	return view('list');	
    }

	function detailBlog($id){

    }

    function blog(){
        return view('blog');
    }

    function postBlog(BlogRequest $request){
    	//post-r damjsan buh utgiig avah
    	dump($request->all());

    	//token-s busad post-r damjsan utgiig avah
    	dump($request->except('_token'));
    	$formData = $request->except('_token');
    	echo $formData['title'];

    	//get single input value
    	dump($request->input('title'));
    	echo "blog post";
    }
}
