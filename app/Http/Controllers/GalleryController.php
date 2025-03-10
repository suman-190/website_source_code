<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();
        return view('backend.pages.gallery.index',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $gallery = new Gallery();
        $gallery->name = $request->name;
        $gallery->description = $request->description;
        $gallery->slag = Str::slug($request->name) . Str::random(8);
        $img_name = '';
        $img_path = '';
        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/gallery/';
            $success = $img_file->move($img_path,$img_name);

        }
        $gallery->image = $img_path.$img_name;
        $gallery->save();
        return redirect()->back()->with('status','gallery Added Sucessfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function deletegallery($gallery_id)
    {
        $gallery = Gallery::where('id',$gallery_id)->first();
        $gallery->delete();
        return back()->with('status', 'gallery has been successfully delete!');
    }

    public function showgallery($id)
    {
        $data = Gallery::find($id);
        return view('backend.pages.gallery.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        $gallery->name = $request->name;
        $gallery->description = $request->description;
        $img_name = '';
        $img_path = '';
        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/gallery/';
            $success = $img_file->move($img_path,$img_name);
            $gallery->image = $img_path.$img_name;

        }
        $gallery->save();
        return $this->index()->with('status','gallery Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */

    // update Status
    public function gallerystatus($id){
        $gallery = Gallery::findorfail($id);
        if($gallery != null){
            if($gallery->status == 'active'){
                $gallery->status = 'inactive';
            }else{
                $gallery->status = 'active';
            }
            $gallery->save();
            return back()->with('success','Status Updated Succesfully !');
        }else{
            return back()->with('error','Sorry gallery Didnot Found.');
        }
    }
}
