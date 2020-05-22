<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\user\category;
use App\Model\user\jargon;
use App\Model\user\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class JargonController extends Controller
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
        $jargons = jargon::all();
        return view('admin.jargon.show',compact('jargons'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags =tag::all();
        $categories =category::all();
        return view('admin.jargon.jargon',compact('tags','categories'));
        /*if (Auth::user()->can('jargons.create')) {
           $tags =tag::all();
            $categories =category::all();
            return view('admin.jargon.jargon',compact('tags','categories'));
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
            'jargon_title'=>'required',
            'jargon_slug' => 'required',
            'jargon_body' => 'required',
            'jargon_image' => 'required',
            ]);
        if ($request->hasFile('jargon_image')) {
            $imageName = $request->image->store('public');
        }else{
            return 'No';
        }
        $jargon = new jargon;
        $jargon->jargon_image = $imageName;
        $jargon->jargon_title = $request->jargon_title;
        $jargon->jargon_slug = $request->jargon_slug;
        $jargon->jargon_body = $request->jargon_body;
        $jargon->status = $request->status;
        $jargon->posted_by = Auth::user()->id;
        $jargon->visit_count = $request->visit_count;
        $jargon->save();
        $jargon->tags()->sync($request->tags);
        $jargon->categories()->sync($request->categories);

        return redirect(route('jargon.index'));
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
            $jargon = jargon::with('tags','categories')->where('id',$id)->first();
            $tags =tag::all();
            $categories =category::all();
            return view('admin.jargon.edit',compact('tags','categories','jargon'));
        /*if (Auth::user()->can('jargons.update')) {
            $jargon = jargon::with('tags','categories')->where('id',$id)->first();
            $tags =tag::all();
            $categories =category::all();
            return view('admin.jargon.edit',compact('tags','categories','jargon'));
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
            'title'=>'required',
            'subtitle' => 'required',
            'jargon_slug' => 'required',
            'jargon_body' => 'required',
            'jargon_image'=>'required',
            'visit_count' => 'nullable',
            ]);
        if ($request->hasFile('jargon_image')) {
            $imageName = $request->image->store('public');
        }
        $jargon = jargon::find($id);
        $jargon->jargon_image = $imageName;
        $jargon->jargon_title = $request->jargon_title;
        $jargon->jargon_slug = $request->jargon_slug;
        $jargon->jargon_body = $request->jargon_body;
        $jargon->status = $request->status;
        $jargon->tags()->sync($request->tags);
        $jargon->categories()->sync($request->categories);
        $jargon->save();

        return redirect(route('jargon.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        jargon::where('id',$id)->delete();
        return redirect()->back();
    }
}
