<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Subategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('is_parent','1')->get();
        return view('backend.pages.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->totalyear = $request->totalyear;
        $category->description = $request->description;
        $img_name = '';
        $img_path = '';
        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/category/';
            $success = $img_file->move($img_path,$img_name);

        }
        $category->image = $img_path.$img_name;

        $category->export = $request->export;
        $category->training_mode = $request->training_mode;
        $img_name = '';
        $img_path = '';
        if($request->file('syllabus')){
            $img_file = $request->file('syllabus');
            $img_name = 'syllabus'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/category/';
            $success = $img_file->move($img_path,$img_name);

        }
        $category->syllabus = $img_path.$img_name;
        
        $category->slag = $request->slag;
        $last_sn = Category::orderByDesc('sn')->first();
        // $category->sn = $last_sn->sn + 1;

        // $category->slag = Str::slug($request->name) . Str::random(8);
        $category->save();
        return redirect()->back()->with('status','Courses Added Sucessfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function deletecategory($category_id)
    {
        $category = Category::where('id',$category_id)->first();
        $category->delete();
        return back()->with('status', 'Courses has been successfully delete!');
    }

    public function showcategory($id)
    {
        $data = Category::find($id);
        return view('backend.pages.category.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        // $category->category = $request->category;
        $category->totalyear = $request->totalyear;
        $category->description = $request->description;
        $img_name = '';
        $img_path = '';
        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/category/';
            $success = $img_file->move($img_path,$img_name);
            $category->image = $img_path.$img_name;

        }

        

        $category->export = $request->export;
        $category->training_mode = $request->training_mode;
        $img_name = '';
        $img_path = '';
        if($request->file('syllabus')){
            $img_file = $request->file('syllabus');
            $img_name = 'syllabus'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/category/';
            $success = $img_file->move($img_path,$img_name);
            $category->syllabus = $img_path.$img_name;
        }
        $category->save();
        return redirect()->route('admin.category.index')->with('status','Courses Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */

    // update Status
    public function categorystatus($id){
        $category = Category::findorfail($id);
        if($category != null){
            if($category->status == 'active'){
                $category->status = 'inactive';
            }else{
                $category->status = 'active';
            }
            $category->save();
            return back()->with('success','Status Updated Succesfully !');
        }else{
            return back()->with('error','Sorry category Didnot Found.');
        }
    }

    public function nav_display($id){
        $category = Category::findorfail($id);
        if($category != null){
            if($category->display_nav == '1'){
                $category->display_nav = '0';
            }else{
                $category->display_nav = '1';
            }
            $category->save();
            return back()->with('success','Updated Succesfully !');
        }else{
            return back()->with('error','Sorry category Didnot Found.');
        }
    }

    public function sn_update(Request $request, $id){
        $category = Category::findorfail($id);
        $category->sn = $request->sn;
        $check = Category::where('sn','=',$request->sn)->first();
        if($check == null){
            $category->save();
            return back();
        }else {

            $above_ads = Category::where('sn','>=',$request->sn)->get();
            foreach($above_ads as $cat){
                $cat->sn += 1;
                $cat->save();
            }
        }
        $category->save();
        return back();
    }
}