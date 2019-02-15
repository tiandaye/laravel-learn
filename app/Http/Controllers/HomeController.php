<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $name;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo $this->name;die();
        return view('home');
    }
}
