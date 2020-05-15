<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\User;
use App\Model\user\hookup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use ZipArchive;

class HookupsController extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth');
    }
    public function index()
    {
        $hookups = hookup::all();
        return view('user.events',compact('events'));   
    }

    public function hookup(Request $request)
    {
        $hookups = hookup::where('status',1)->orderBy('created_at','ASC')->paginate(2000000);
    	return view('user.hookup',compact('hookups'));
    }
}
