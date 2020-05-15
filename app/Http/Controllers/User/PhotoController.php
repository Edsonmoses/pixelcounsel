<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\User;
use App\Model\user\like;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image as Image;
use File;
use ZipArchive;

class PhotoController extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth');
    }
    	
	public function submitPhoto(post $post)
    {
        	$postKey = 'blog' . $post->id;
        if(!Session::has($postKey)){
            $post->increment('visit_count');
            Session::put($postKey,1);
        }
		$tags =tag::all();
        $categories =category::all();
		$posts = post::where('status',1)->orderBy('created_at','DESC')->paginate(2000000);
		return view('user.submitPhoto',compact('posts', 'tags','categories'));
	}
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')) {
           $tags =tag::all();
            $categories =category::all();
            return view('user.submitPhoto',compact('tags','categories'));
        }
        return redirect(route('home'));
        
    }
 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required',
            'visit_count' => 'nullable',
            ]);
        if ($request->hasFile('image')) {
            
           $imageName = $request->image->store('public');
        }else{
            return 'No';
        }
        $post = new post;
        $post->image = $imageName;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->posted_by = Auth::user()->id;
        $post->visit_count = $request->visit_count;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        return redirect(route('submitPhoto'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('posts.update')) {
            $post = post::with('tags','categories')->where('id',$id)->first();
            $tags =tag::all();
            $categories =category::all();
            return view('user.submitPhotoedit',compact('tags','categories','post'));
        }
        return redirect(route('submitPhoto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image'=>'required',
            'visit_count' => 'nullable',
            ]);
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public');
        }
        $post = post::find($id);
        $post->image = $imageName;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->visit_count = $request->visit_count;
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        $post->save();

        return redirect(route('submitPhoto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();
        return redirect()->back();
    }

    public function download($id){
        $post = post::find($id);
        $post->downloads = $post->downloads + 1;
        $post->save();
        $pathToFile = storage_path('app\\'. $post->image);
        \Zipper::make(storage_path('app\\'. $post->image.'.zip'))->add($pathToFile)->close();
        return response()->download(storage_path('app\\'. $post->image.'.zip'));
     }
     public function fileUpload()

     {
 
         return view('user.download');
 
     }
     public function fileUploadPost(Request $request)

     {
 
        try{
            if($request->hasFile('file')){
               $post= new post;
               $image = $request->file('file');
               // $filename = time() . '.' . $image->getClientOriginalExtension();
               $originalname = str_random(30).'.'.$image->getClientOriginalExtension();
               $image->move(public_path().'/uploads/',$originalname);
               $post->image = $originalname;
               $post->save();
               return back()->with('success', 'Image Upload successfully');
             }
       
       }catch(Exception $e){
           return $e->getMessage();
       }
 
     }
}
