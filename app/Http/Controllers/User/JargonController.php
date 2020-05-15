<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\User;
use App\Model\user\jargon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use ZipArchive;

class JargonController extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth');
    }
    public function index()
    {
        $jargons = jargon::all();
        return view('user.jargon',compact('jargons'));   
    }

    public function jorgon(Request $request)
    {
        $jargons = jargon::where('status',1)->orderBy('created_at','ASC')->paginate(2000000);
    	return view('user.jargon',compact('jargons'));
    }
}
