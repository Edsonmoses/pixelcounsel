<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\jargon;
use App\Model\user\event;
use App\Model\user\hookup;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $events = event::all();
        $jargons = jargon::all();
        $hookups = hookup::all();
        return view('user.landing-page',compact('events','jargons','hookups'));
    }

     public function tag(tag $tag)
    {
        $posts = $tag->posts();
        return view('user.blogs',compact('posts'));
    }

    public function category(category $category)
    {
        $posts = $category->posts();
        return view('user.blogs',compact('posts'));
    }
   
   

   
    public function blog(Request $request)
    {
        $posts = post::where('status',1)->orderBy('created_at','DESC')->paginate(2000000);
    	return view('user.blogs',compact('posts'));
    }
}
