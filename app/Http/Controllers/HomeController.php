<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\user\vector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vectors = vector::where('status',1)->orderBy('created_at','DESC')->paginate(2000000);
    	return view('vector',compact('vectors'));
    }

   
}
