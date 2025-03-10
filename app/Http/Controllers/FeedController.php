<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feed = Feed::all();
        return view('backend.pages.feed.index',compact('feed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.pages.feed');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $feed = new Feed();
        $feed->name = $request->name;
        $feed->email = $request->email;
        $feed->contact = $request->contact;


        $img_name = '';
        $img_path = '';
        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'feedback/';
            $success = $img_file->move($img_path,$img_name);

        }
        $feed->image = $img_path.$img_name;

        $feed->message = $request->message;
        $feed->slag = Str::slug($request->name) . Str::random(8);
        $feed->save();
        return redirect()->back()->with('status','Feedback  Sent Sucessfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function deletefeed($feed_id)
    {
        $feed = Feed::where('id',$feed_id)->first();
        $feed->delete();
        return back()->with('status', 'Feedback has been successfully delete!');
    }

    public function showfeed($id)
    {
        $data = Feed::find($id);
        return view('backend.pages.feed.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $feed = Feed::find($id);
        $feed->name = $request->name;
        $feed->email = $request->email;
        $feed->contact = $request->contact;

        $img_name = '';
        $img_path = '';
        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'feedback/';
            $success = $img_file->move($img_path,$img_name);

        }
        $feed->image = $img_path.$img_name;

        $feed->message = $request->message;
        $feed->save();
        return $this->index()->with('status','Feedback Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(feed $feed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\feed  $feed
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\feed  $feed
     * @return \Illuminate\Http\Response
     */

    // update Status
    public function feedstatus($id){
        $feed = Feed::findorfail($id);
        if($feed != null){
            if($feed->status == 'active'){
                $feed->status = 'inactive';
            }else{
                $feed->status = 'active';
            }
            $feed->save();
            return back()->with('success','Status Updated Succesfully !');
        }else{
            return back()->with('error','Sorry feed Didnot Found.');
        }
    }
}
