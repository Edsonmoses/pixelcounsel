<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\User;
use App\Model\user\like;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use ZipArchive;


class PostController extends Controller
{
    public function post(post $post)
    {
    	return view('user.post',compact('post'));
    }

    public function getAllPosts()
    {
		$postKey = 'blog' . $post->id;
        if(!Session::has($postKey)){
            $post->increment('visit_count');
            Session::put($postKey,1);
        }
    	return $posts = post::with('likes')->where('status',1)->orderBy('created_at','DESC')->paginate(2000000);
    }

    public function saveLike(request $request)
    {
    	$likecheck = like::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->first();
    	if ($likecheck) {
    		like::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->delete();
    		return 'deleted';
    	}else{
	    	$like = new like;
	    	$like->user_id = Auth::id();
	    	$like->post_id = $request->id;
	    	$like->save();
    	}
	}
	


}
