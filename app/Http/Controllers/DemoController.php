<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DemoController extends Controller
{
    function index(){
    	return "form controller";
    }

    function apple(){
    	return 'this is apple';
    }
}
