<?php

namespace App\Http\Controllers\Orm;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PostController extends AdminController
{
    function index(Request $request){
    	
        //Session::flush('color');

        if(Session::has('color')){
            Session::set('color', 'green');
        }else{
            Session::set('color', 'blue');
        }



        $color = Session::get('color');

        echo "<div style='background: ". $color .";'> Hello Session </div>";

        $post = Post::get();

        // foreach ($post as $p) {
        //     foreach($p->comments as $c){
        //         echo $c->comment . "<hr />";
        //     }
        // }

    	// return response()->json($post);
    }

    function store(Request $request){
		// dump($request->all);
    	$formData = $request->except('_token');
    	// dump($formData);
    	$formData['user_id'] = Auth::user()->id;
    	if(Post::create($formData)){
    		return response()->json(['status' => true]);
    	}else{
    		return response()->json(['status' => false]);
    	}
    }

    function update(Request $request, $id){
    	$model = Post::find($id);
    	$formData = $request->except('_token');
    	$formData['user_id'] = Auth::user()->id;
    	$model->fill($formData);
    	if($model->save()){

    	}else{

    	}

    }

    function destroy($id){
    	if(Post::delete($id)){

    	}else{

    	}
    }
}
