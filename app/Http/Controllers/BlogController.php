<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests;
use App\Http\Requests\BlogRequest;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    private $faker;

    function __construct(){
        $this->faker = Faker::create();
    }

    function getList(Request $request){
        // $data = [];
        
        // for($i = 0; $i < 20; $i++){
        //     $d = [
        //         'title' => $this->faker->name,
        //         'content' => $this->faker->text
        //     ];
        //     array_push($data, $d);
        // }

        //buh moriig butsaah
        // $data = DB::table('post')->get();

        //todorhoi toonii mor butsaah
        // $data = DB::table('post')->select('id', 'title')->skip(10)->take(10)->get();

        //nohtsol shalgah
        // $data = DB::table('post')->where('id', '=', 15)->orWhere('id', '=', 16)->get();
        // dump($data);

        // $data = DB::table('post')->whereIn('id', [15,16,17,35])->orderBy('id', 'desc')->get();
        // dump($data);

        $data = DB::select(DB::raw('select * from post'));
        dump($data);

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
