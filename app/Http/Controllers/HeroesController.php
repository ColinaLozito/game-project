<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hero;

class HeroesController extends Controller
{
    //
    public function create(){
    	return view('create');
    }

    public function store(Request $request){
    	$hero  = new Hero($request->all());
    	$hero -> save();
    	return \Redirect::to('play');
    }
}
