<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function __construct(){
    	// if (Auth::check()) {
    	// 	$role = Auth::user()->role;
     //        dump('welcome');
     //    }else{
     //    	return 'go back';
     //    }
    	echo "<h1>test</h1> <hr>";
    }

    function setLocale(Request $request, $locale){
    	\App::setLocale('mn');
    	echo $lang = \App::getLocale();
    	echo trans('tr.apple');
    	dump($request);


    }

}
