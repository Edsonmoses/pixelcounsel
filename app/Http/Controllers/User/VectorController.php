<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\User;
use App\Model\user\vector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use ZipArchive;

class VectorController extends Controller
{

    public function __construct()
	{
	    $this->middleware('auth');
    }
    public function index()
    {
        $vectors = vector::all();
        return view('vector',compact('vectors'));   
    }

    public function vector(vector $vector)
    {
      $vectors = vector::find($id);
    	return view('user.vector',compact('vector'));
    }

    public function vectors(Request $request)
    {
      
        $vectors = vector::where('status',1)->orderBy('created_at','DESC')->paginate(2000000);
    	return view('vector',compact('vectors'));
    }

    public function getAllVectors()
    {
		$vectorKey = 'vector' . $vector->id;
        if(!Session::has($vectorKey)){
            $vector->increment('visit_count');
            Session::put($vectorKey,1);
        }
    	return $vectors = vector::with('likes')->where('status',1)->orderBy('created_at','DESC')->paginate(2000000);
    }
    public function store(Request $request)
{
    $this->validate($request, [
      'vectors_image' => 'sometimes',
      'vectors_thumbnail' => 'sometimes',
    ]);

    $vectors = new Vector();
    try{
        if ($request->hasFile('vectors_image')) {
          $image = $request->file('vectors_image');
            $originalname = str_random(30).'.'.$image->getClientOriginalExtension();
            $image->move(storage_path().'/app/public/eps/',$originalname);
            $vectors->vectors_image = $originalname;
          }
          if ($request->hasFile('vectors_thumbnail')) {
            $imageName = $request->vectors_thumbnail->store('public/eps/thumbnail');
        }
        }catch(Exception $e){
          return $e->getMessage();
      }

      $vectors->vectors_thumbnail = $imageName;
      $vectors->vectors_title = $request->get('vectors_title');
      $vectors->vectors_slug = str_slug($request->get('vectors_title'), '-');
      $vectors->vectors_body = $request->get('vectors_body');
      $vectors->vectors_type = $request->get('vectors_type');
      $vectors->posted_by = Auth::user()->id;
      $vectors->contributor = $request->get('contributor');
      $vectors->status = $request->status;
      $vectors->visit_count = $request->visit_count;

      $vectors->save();
      return back()->with('success', 'Your Eps has been added successfully. Please wait for the admin to approve.');
}

public function download($id){
  $vectors = vector::find($id);
  $vectors->downloads = $vector->downloads + 1;
  $vectors->save();
  $pathToFile = storage_path('app\public\eps\\'. $vectors->vectors_image);
  \Zipper::make(storage_path('app\public\eps\\'. $vectors->vectors_image.'.zip'))->add($pathToFile)->close();
  return response()->download(storage_path('app\public\eps\\'. $vectors->vectors_image.'.zip'));
}

}
