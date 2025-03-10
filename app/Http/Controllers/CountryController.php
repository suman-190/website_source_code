<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = Country::all();
        return view('backend.pages.country.index',compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $country = new Country();
        $country->name = $request->name;
        $country->totalyear = $request->totalyear;
        $country->description = $request->description;
        $country->slag = Str::slug($request->name) . Str::random(8);
        $img_name = '';
        $img_path = '';
        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/country/';
            $success = $img_file->move($img_path,$img_name);

        }
        $country->image = $img_path.$img_name;
        $country->save();
        return redirect()->back()->with('status','country Added Sucessfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function deletecountry($country_id)
    {
        $country = Country::where('id',$country_id)->first();
        $country->delete();
        return back()->with('status', 'country has been successfully delete!');
    }

    public function showcountry($id)
    {
        $data = Country::find($id);
        return view('backend.pages.country.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        $country->name = $request->name;
        $country->totalyear = $request->totalyear;
        $country->description = $request->description;
        $img_name = '';
        $img_path = '';
        if($request->file('image')){
            $img_file = $request->file('image');
            $img_name = 'image'.Str::lower(Str::random(9)).'.'.$img_file->getClientOriginalExtension();
            $img_path = 'content/upload/country/';
            $success = $img_file->move($img_path,$img_name);
            $country->image = $img_path.$img_name;

        }
        $country->save();
        return $this->index()->with('status','country Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */

    // update Status
    public function countrystatus($id){
        $country = Country::findorfail($id);
        if($country != null){
            if($country->status == 'active'){
                $country->status = 'inactive';
            }else{
                $country->status = 'active';
            }
            $country->save();
            return back()->with('success','Status Updated Succesfully !');
        }else{
            return back()->with('error','Sorry country Didnot Found.');
        }
    }
}
