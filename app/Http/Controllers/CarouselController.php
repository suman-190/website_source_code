<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Support\Str;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel = Carousel::orderby('id','desc')->get();
        return view('backend.pages.carousel.index',compact('carousel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.carousel.create');
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
            'carousel_img' => 'required|file',
        ]);
        $carousel = new Carousel();
        $carousel->name = $request->name;
        $carousel->url = $request->carousel_url;
        $carousel->slag = Str::slug($request->name) . Str::random(8);
        $img_name = '';
        $img_path = '';
        if($request->file('carousel_img')){
            $img_file = $request->file('carousel_img');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/carousel/';
            $success = $img_file->move($img_path,$img_name);

        }
        $carousel->image = $img_path.$img_name;
        $carousel->save();
        return redirect()->back()->with('status','Carousel Added Sucessfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function deleteCarousel($id)
    {
        $carousel = Carousel::where('id',$id)->first();
        $carousel->delete();
        return back()->with('status', 'carousel has been successfully delete!');
    }

    public function showCarousel($id)
    {
        $data = Carousel::find($id);
        return view('backend.pages.carousel.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $carousel = Carousel::find($id);
        $carousel->name = $request->name;
        $carousel->url = $request->carousel_url;
        $img_name = '';
        $img_path = '';
        if($request->file('carousel_img')){
            $img_file = $request->file('carousel_img');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/carousel/';
            $success = $img_file->move($img_path,$img_name);
            $carousel->image = $img_path.$img_name;

        }
        $carousel->save();
        return $this->index()->with('status','Banners Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */

    // update Status
    public function carouselstatus($id){
        $carousel = Carousel::findorfail($id);
        if($carousel != null){
            if($carousel->status == 'active'){
                $carousel->status = 'inactive';
            }else{
                $carousel->status = 'active';
            }
            $carousel->save();
            return back()->with('success','Status Updated Succesfully !');
        }else{
            return back()->with('error','Sorry carousel Didnot Found.');
        }
    }
}
