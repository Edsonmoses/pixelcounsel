<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\user\category;
use App\Model\user\hookup;
use App\Model\user\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class HookupController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hookups = hookup::all();
        return view('admin.hookup.show',compact('hookups'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = tag::all();
        $categories =category::all();
        return view('admin.hookup.hookup',compact('tags','categories'));
     /* if (Auth::user()->can('hookups.create')) {
            $tags =hookup_tag::all();
             $categories =category::all();
             return view('admin.hookup.hookup',compact('tags','categories'));
        }
        return redirect(route('admin.home'));*/
        
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
            'company'=>'required',
            'job_slug' => 'required',
            'position' => 'required',
            'job_description' => 'required',
            'job_locations' => 'required',
            'visit_count' => 'nullable',
            ]);
       
        $hookup = new hookup;
        $hookup->company = $request->company;
        $hookup->job_slug = $request->job_slug;
        $hookup->position = $request->position;
        $hookup->job_description = $request->job_description;
        $hookup->job_locations = $request->job_locations;
        $hookup->status = $request->status;
        $hookup->posted_by = Auth::user()->id;
        $hookup->visit_count = $request->visit_count;
        $hookup->save();
        $hookup->tags()->sync($request->tags);
        $hookup->categories()->sync($request->categories);

        return redirect(route('hookup.index'));
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
        $hookup = hookup::with('tags','categories')->where('id',$id)->first();
        $tags =tag::all();
        $categories =category::all();
        return view('admin.hookup.edit',compact('tags','categories','hookup'));
        /*if (Auth::user()->can('hookups.update')) {
            $hookup = hookup::with('tags','categories')->where('id',$id)->first();
            $tags =hookup_tag::all();
            $categories =category::all();
            return view('admin.hookup.edit',compact('tags','categories','hookup'));
        }
        return redirect(route('admin.home'));*/
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
            'company'=>'required',
            'job_slug' => 'required',
            'position' => 'required',
            'job_description' => 'required',
            'job_locations' => 'required',
            'visit_count' => 'nullable',
            ]);
        
        $hookup = hookup::find($id);
        $hookup->company = $request->company;
        $hookup->job_slug = $request->job_slug;
        $hookup->position = $request->position;
        $hookup->job_description = $request->job_description;
        $hookup->job_locations = $request->job_locations;
        $hookup->status = $request->status;
        $hookup->visit_count = $request->visit_count;
        $hookup->tags()->sync($request->tags);
        $hookup->categories()->sync($request->categories);
        $hookup->save();

        return redirect(route('hookup.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        hookup::where('id',$id)->delete();
        return redirect()->back();
    }
}
