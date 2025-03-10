<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = Category::where('is_parent',0)->get();
        return view('backend.pages.subcategory.index',compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('is_parent',1)->get();
        return view('backend.pages.subcategory.create',compact('category'));
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
            'category' => 'required|exists:categories,id'
        ]);
        $subcategory = new Category();
        $subcategory->name = $request->name;
        $subcategory->type = $request->type;
        // $subcategory->subcategory = $request->subcategory;
        $subcategory->totalyear = $request->totalyear;
        $subcategory->description = $request->description;
        $img_name = '';
        $img_path = '';
        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/subcategory/';
            $success = $img_file->move($img_path,$img_name);

        }
        $subcategory->image = $img_path.$img_name;
        
        $subcategory->export = $request->export;
        $subcategory->training_mode = $request->training_mode;
        $img_name = '';
        $img_path = '';
        if($request->file('syllabus')){
            $img_file = $request->file('syllabus');
            $img_name = 'syllabus'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/category/';
            $success = $img_file->move($img_path,$img_name);
            $subcategory->syllabus = $img_path.$img_name;
        }

        $subcategory->slag = $request->slag;
        $subcategory->is_parent = 0;
        $subcategory->parent_id = $request->category;
        $subcategory->save();
        // $subcategory->category()->sync($request->category);
        return redirect()->back()->with('status','Courses Added Sucessfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function deletesubcategory($subcategory_id)
    {
        $subcategory = Category::where('id',$subcategory_id)->first();
        $subcategory->delete();
        return back()->with('status', 'Courses has been  delete!');
    }

    public function showsubcategory($id)
    {
        $data = Category::find($id);
        $category = Category::where('is_parent',1)->get();
        return view('backend.pages.subcategory.edit', ['data' => $data])->with('category',$category);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|exists:categories,id'
        ]);
        $subcategory = Category::find($id);
        $subcategory->name = $request->name;
        $subcategory->type = $request->type;
        // $subcategory->subcategory = $request->subcategory;
        $subcategory->totalyear = $request->totalyear;
        $subcategory->description = $request->description;
        $img_name = '';
        $img_path = '';
        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/subcategory/';
            $success = $img_file->move($img_path,$img_name);
            $subcategory->image = $img_path.$img_name;

        }
        $subcategory->is_parent = 0;
        $subcategory->parent_id = $request->category;
        
        $subcategory->export = $request->export;
        $subcategory->training_mode = $request->training_mode;
        $img_name = '';
        $img_path = '';
        if($request->file('syllabus')){
            $img_file = $request->file('syllabus');
            $img_name = 'syllabus'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/category/';
            $success = $img_file->move($img_path,$img_name);
            $subcategory->syllabus = $img_path.$img_name;
        }
        $subcategory->save();
        return redirect()->route('admin.subcategory.index')->with('status','Courses Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(subcategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */

    // update Status
    public function subcategorystatus($id){
        $subcategory = Category::findorfail($id);
        if($subcategory != null){
            if($subcategory->status == 'active'){
                $subcategory->status = 'inactive';
            }else{
                $subcategory->status = 'active';
            }
            $subcategory->save();
            return back()->with('success','Status Updated Succesfully !');
        }else{
            return back()->with('error','Sorry subcategory Didnot Found.');
        }
    }
}