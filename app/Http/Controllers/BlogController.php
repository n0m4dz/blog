<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests;
use App\Http\Requests\BlogRequest;
use Faker\Factory as Faker;

class BlogController extends Controller
{
    private $faker;

    function __construct(){
        $this->faker = Faker::create();
    }

    function getList(Request $request){
        $data = [];
        
        for($i = 0; $i < 20; $i++){
            $d = [
                'title' => $this->faker->name,
                'content' => $this->faker->text
            ];
            array_push($data, $d);
        }

        // dump($data);
        //pass data by array
        return view('list', ['mydata' => $data]);	

        //pass data by compact helper

        //pass data by with helper

        //pass data by withAlias helper

    }

	function detailBlog($id){

    }

    function blog(){
        $title = "blog page from controller";
        $second = "I am second data";
        $pageTitle = $title;
        $master = "New master";
        view()->share('master', $master);
        //return view('blog', ['pageTitle' => $title]);

        //pass data by 'compact' helper
        return view('blog', compact('pageTitle', 'second'));

        //pass data by 'with' helper
        //return view('blog')->with('pageTitle', $title)->with('second', $second);

        //pass data by 'withAlias' helper
        //return view('blog')->withPageTitle($title);
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
