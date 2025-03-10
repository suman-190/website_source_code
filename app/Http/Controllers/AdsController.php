<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\Adsposition;
use Illuminate\Support\Str;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.ads.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adsposition = Adsposition::all();
        return view('backend.pages.ads.create',compact('adsposition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $ads = new Ads();
        $ads->url = $request->url;
        // $ads->title = $request->title;
        $ads->adsposition_id = $request->adsposition_id;
        // $ads->display_to = $request->display_to;

        $img_name = '';
        $img_path = '';
        if($request->file('image_id')){
            $img_file = $request->file('image_id');
            $img_name = 'image_id'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/ads/';
            $success = $img_file->move($img_path,$img_name);

        }
        $ads->image_id = $img_path.$img_name;
        $last_sn = Ads::orderByDesc('sn')->first();
        if($last_sn){
            $ads->sn = $last_sn->sn + 1;
        }else{
            $ads->sn = 1;
        }

        $ads->save();
        return redirect()->back()->with('status','ads Added Sucessfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function deleteads($ads_id)
    {
        $ads = Ads::where('id',$ads_id)->first();
        $ads->delete();
        return back()->with('status', 'ads has been successfully delete!');
    }

    public function adslist($id)
    {
        $ads = Ads::where('adsposition_id',$id)->orderby('sn','asc')->get();
        $adsposition = Adsposition::where('id',$id)->first();
        return view('backend.pages.ads.adslistpage', compact('ads','adsposition'));
    }

    public function adsdetail($id)
    {
        $ads = Ads::where('id',$id)->first();
        return view('backend.pages.ads.adsdetailpage', compact('ads'));
    }

    public function showads($id)
    {
        $data = Ads::find($id);
        $ads = Ads::all();
        $adsposition = Adsposition::all();
        return view('backend.pages.ads.edit',compact('ads','adsposition','data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|exists:post_images,id'
        ]);
        $ads = Ads::find($id);
        $ads->url = $request->url;
        $ads->title = $request->title;
        $ads->adsposition_id = $request->adsposition_id;
        $ads->display_to = $request->display_to;

        $img_name = '';
        $img_path = '';
        if($request->file('image_id')){
            $img_file = $request->file('image_id');
            $img_name = 'image_id'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/ads/';
            $success = $img_file->move($img_path,$img_name);
            $ads->image_id = $img_path.$img_name;

        }
        $ads->save();
        return redirect()->route('admin.ads.index')->with('ads Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit(ads $ads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ads  $ads
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ads  $ads
     * @return \Illuminate\Http\Response
     */

    // update Status
    public function adsstatus($id){
        $ads = Ads::findorfail($id);
        if($ads != null){
            if($ads->status == 'active'){
                $ads->status = 'inactive';
            }else{
                $ads->status = 'active';
            }
            $ads->save();
            return back()->with('success','Status Updated Succesfully !');
        }else{
            return back()->with('error','Sorry ads Didnot Found.');
        }
    }

    public function sn_update(Request $request, $id){
        $ads = Ads::findorfail($id);
        $ads->sn = $request->sn;
        $above_ads = Ads::where('sn','>=',$request->sn)->get();
        $check = Ads::where('sn','=',$request->sn)->first();
        if($check == null){
            $ads->save();
            return back();
        }
        foreach($above_ads as $ad){
            $ad->sn += 1;
            $ad->save();
        }
        $ads->save();
        return back();
    }
}
