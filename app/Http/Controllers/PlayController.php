<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class PlayController extends Controller
{
    public function create(){

    }

    public function getData(Request $request){
    	$data = \DB::table('heroes')->get();
    	$data = $data->all();
    	return view('play',compact('data'));
    }

     public function getEnemies(Request $request){
    	$data = \DB::table('enemies')->get();
    	$data = $data->all();
    	return $data;
    }

    public function heroUpdate()
    {
    	$id = $_GET['id'];
    	$health = $_GET['health'];

    	\DB::table('heroes')
        ->where('id', $id)
        ->update(['health' => $health]);
    }

    public function saveLog(Request $request){
    	$logs  = new Play($request->all());
    	$logs -> save();
    	// return \Redirect::to('play');
    }
}
