<?php

namespace App\Http\Controllers;
use App\Models\Adsposition;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdspositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adsposition = Adsposition::all();
        return view('backend.pages.adsposition.index',compact('adsposition'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.adsposition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $adsposition = new Adsposition();
        $adsposition->title = $request->title;
        $adsposition->save();
        return redirect()->back()->with('status','adsposition Added Sucessfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\adsposition  $adsposition
     * @return \Illuminate\Http\Response
     */
    public function deleteadsposition($adsposition_id)
    {
        $adsposition = Adsposition::where('id',$adsposition_id)->first();
        $adsposition->delete();
        return back()->with('status', 'adsposition has been successfully delete!');
    }

    public function showadsposition($id)
    {
        $data = Adsposition::find($id);
        return view('backend.pages.adsposition.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $adsposition = Adsposition::find($id);
        $adsposition->title = $request->title;
        $adsposition->save();
        return redirect()->route('admin.adsposition.index')->with('status','adsposition Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\adsposition  $adsposition
     * @return \Illuminate\Http\Response
     */
    public function edit(adsposition $adsposition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\adsposition  $adsposition
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\adsposition  $adsposition
     * @return \Illuminate\Http\Response
     */

    // update Status
    public function adspositionstatus($id){
        $adsposition = Adsposition::findorfail($id);
        if($adsposition != null){
            if($adsposition->status == 'active'){
                $adsposition->status = 'inactive';
            }else{
                $adsposition->status = 'active';
            }
            $adsposition->save();
            return back()->with('success','Status Updated Succesfully !');
        }else{
            return back()->with('error','Sorry adsposition Didnot Found.');
        }
    }
}
