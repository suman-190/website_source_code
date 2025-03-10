<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::all();
        return view('backend.pages.video.index',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.video.create');
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
            'status' => 'required|in:active,inactive',
        ]);
        $video = new Video();
        $video->id = 1;
        $video->name = $request->name;
        $video->video = $request->video;
        $video->slag = Str::slug($request->name) . Str::random(8);
        $video->save();
        return redirect()->back()->with('status','video Added Sucessfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function deletevideo($video_id)
    {
        $video = Video::where('id',$video_id)->first();
        $video->delete();
        return back()->with('status', 'video has been successfully delete!');
    }

    public function showvideo($id)
    {
        $data = Video::find($id);
        return view('backend.pages.video.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $video = Video::find($id);
        $video->name = $request->name;
        $video->video = $request->video;
        $video->save();
        return $this->index()->with('status','video Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */

    // update Status
    public function videostatus($id){
        $video = Video::findorfail($id);
        if($video != null){
            if($video->status == 'active'){
                $video->status = 'inactive';
            }else{
                $video->status = 'active';
            }
            $video->save();
            return back()->with('success','Status Updated Succesfully !');
        }else{
            return back()->with('error','Sorry video Didnot Found.');
        }
    }
}
