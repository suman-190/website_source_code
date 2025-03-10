<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;
use Illuminate\Support\Str;
use App\Models\Courses;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $college = College::orderby('id','desc')->get();
        return view('backend.pages.college.index',compact('college'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cources = Courses::all();
        return view('backend.pages.college.create',compact('cources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'courses' => 'required',
            'courses.*' => 'exists:courses,id',
        ]);
        $college = new College();
        $college->name = $request->name;
        $college->export = $request->export;
        $college->description = $request->description;
        $college->collegefeatures = $request->collegefeatures;
        $college->state = $request->state;
        $college->city = $request->city;
        $college->address = $request->address;
        $college->email = $request->email;
        $college->slag = Str::slug($request->name) . Str::random(8);
        $img_name = '';
        $img_path = '';
        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/college/';
            $success = $img_file->move($img_path,$img_name);

        }
        $college->image = $img_path.$img_name;
        $college->save();
        $college->courses()->sync($request->courses);
        return redirect()->back()->with('status','college Added Sucessfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\college  $college
     * @return \Illuminate\Http\Response
     */
    public function deletecollege($college_id)
    {
        $college = College::where('id',$college_id)->first();
        $college->delete();
        return back()->with('status', 'college has been successfully delete!');
    }

    public function showcollege($id)
    {
        $data = College::find($id);
        $cources = Courses::all();
        return view('backend.pages.college.edit', ['data' => $data])->with('college',$data)->with('cources',$cources);
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'courses' => 'required',
            'courses.*' => 'exists:courses,id',
        ]);
        $college = College::find($id);
        $college->name = $request->name;
        $college->export = $request->export;
        $college->description = $request->description;
        $college->collegefeatures = $request->collegefeatures;
        $college->state = $request->state;
        $college->city = $request->city;
        $college->address = $request->address;
        $college->email = $request->email;
        $img_name = '';
        $img_path = '';
        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/college/';
            $success = $img_file->move($img_path,$img_name);
            $college->image = $img_path.$img_name;

        }
        $college->save();

        $college->courses()->sync($request->courses);
        return $this->index()->with('status','college Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\college  $college
     * @return \Illuminate\Http\Response
     */
    public function edit(college $college)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\college  $college
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\college  $college
     * @return \Illuminate\Http\Response
     */

    // update Status
    public function collegestatus($id){
        $college = College::findorfail($id);
        if($college != null){
            if($college->status == 'active'){
                $college->status = 'inactive';
            }else{
                $college->status = 'active';
            }
            $college->save();
            return back()->with('success','Status Updated Succesfully !');
        }else{
            return back()->with('error','Sorry college Didnot Found.');
        }
    }
}
