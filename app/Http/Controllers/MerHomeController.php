<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('home.index');
       
    }
      public function help(){
        return view('home.help',['apps'=>"hello"]);
    }
    public function account(){
      return view('home.account',['apps'=>"hello"]);
    }
    public function show($id){
        $data=[
            'iphone' =>"iphone",
            'samsung' =>'heashee'
        ];
        return view('home.index',['apps'=> $data[$id] ?? 'App ' . $id . 'does not exist' ]);
    }
}
