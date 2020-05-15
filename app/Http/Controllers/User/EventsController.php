<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\User;
use App\Model\user\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use ZipArchive;


class EventsController extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth');
    }
    public function index()
    {
        $events = event::all();
        return view('user.events',compact('events'));   
    }

    public function events(Request $request)
    {
        $events = event::where('status',1)->orderBy('created_at','DESC')->paginate(2000000);
    	return view('user.events',compact('events'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'events_image' => 'sometimes',
        ]);
    
        $events = new event();
        try{
            if ($request->hasFile('events_image')) {
              $image = $request->file('events_image');
                $originalname = str_random(30).'.'.$image->getClientOriginalExtension();
                $image->move(storage_path().'/app/public/events/',$originalname);
                $events->events_image = $originalname;
              }
            }catch(Exception $e){
              return $e->getMessage();
          }
    
          $events->events_title = $request->get('events_title');
          $events->events_subtitle = $request->get('events_subtitle');
          $events->events_slug = str_slug($request->get('events_title'), '-');
          $events->events_body = $request->get('events_body');
          $events->events_type = $request->get('events_type');
          $events->events_date = $request->get('events_date');
          $events->posted_by = Auth::user()->id;
          $events->status = $request->status;
          $events->visit_count = $request->visit_count;
    
          $events->save();
          return back()->with('success', 'Your Eps has been added successfully. Please wait for the admin to approve.');
    }
    
    public function download($id){
      $events = event::find($id);
      $events->downloads = $vector->downloads + 1;
      $events->save();
      $pathToFile = storage_path('app\public\eps\\'. $events->events_image);
      \Zipper::make(storage_path('app\public\eps\\'. $events->events_image.'.zip'))->add($pathToFile)->close();
      return response()->download(storage_path('app\public\eps\\'. $events->events_image.'.zip'));
    }
}
