<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hero;

class LogsController extends Controller
{
    public function getData(Request $request){
    	$data = \DB::table('heroes')->get();
    	$data = $data->all();
    	return view('logs',compact('data'));
    }

    public function heroUpdate()
    {
    	$id = $_GET['id'];
		\DB::table('heroes')
        ->where('id', $id)
        ->delete();
    }

}
