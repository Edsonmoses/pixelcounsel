<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //

    /**
     * 
     */
    public function index(Request $resquest) 
    {
    
        $term =  $resquest->query->get('term');
        $term = $term ? $term : '';

        $posts = DB::table('posts')
             ->select(['posts.id','posts.title','posts.subtitle','posts.image','categories.name'])
             ->where('title' ,'LIKE' ,"%{$term}%")
             ->orWhere('subtitle' ,'LIKE' ,"%{$term}%")
             ->join('category_posts','posts.id','=','category_posts.post_id')
             ->join('categories','category_posts.category_id','=','categories.id')
             ->orWhere('categories.name','LIKE',"%{$term}%")
             ->get();

            /* return response()->json($post);*/

             return view('user.blog',['posts' => $posts]);

         

    }
}
