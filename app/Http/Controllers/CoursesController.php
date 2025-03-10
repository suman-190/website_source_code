<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use Illuminate\Support\Str;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::all();
        return view('backend.pages.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $courses = new courses();
        $courses->name = $request->name;
        $courses->totalyear = $request->totalyear;
        $courses->description = $request->description;
        $courses->slag = Str::slug($request->name) . Str::random(8);
        $img_name = '';
        $img_path = '';
        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/courses/';
            $success = $img_file->move($img_path,$img_name);

        }
        $courses->image = $img_path.$img_name;
        $courses->save();
        return redirect()->back()->with('status','courses Added Sucessfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function deletecourses($courses_id)
    {
        $courses = courses::where('id',$courses_id)->first();
        $courses->delete();
        return back()->with('status', 'courses has been successfully delete!');
    }

    public function showcourses($id)
    {
        $data = courses::find($id);
        return view('backend.pages.courses.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $courses = Courses::find($id);
        $courses->name = $request->name;
        $courses->totalyear = $request->totalyear;
        $courses->description = $request->description;
        $img_name = '';
        $img_path = '';
        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/courses/';
            $success = $img_file->move($img_path,$img_name);
            $courses->image = $img_path.$img_name;
        }
        $courses->save();
        return $this->index()->with('status','courses Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(courses $courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\courses  $courses
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\courses  $courses
     * @return \Illuminate\Http\Response
     */

    // update Status
    public function coursesstatus($id){
        $courses = courses::findorfail($id);
        if($courses != null){
            if($courses->status == 'active'){
                $courses->status = 'inactive';
            }else{
                $courses->status = 'active';
            }
            $courses->save();
            return back()->with('success','Status Updated Succesfully !');
        }else{
            return back()->with('error','Sorry courses Didnot Found.');
        }
    }
}
