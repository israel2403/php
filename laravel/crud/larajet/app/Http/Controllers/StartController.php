<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index(Request $request)
    {
        $array = ['name'=>$request->query('name', 'NN')];
        return view('test/view1')->with($array);
    }
}
