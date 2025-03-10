<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\College;
use App\Mail\ApplyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message = Message::orderby('id','desc')->get();
        return view('backend.pages.message.index',compact('message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.pages.message');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // dd($request);
        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->contact = $request->contact;
        $message->message = $request->message;
        $message->education = $request->education;
        $message->course_id = $request->course_id;
        $message->college_id = $request->college_id;
        $message->slag = Str::slug($request->name) . Str::random(8);
        $message->save();
        // $college = College::findorfail($request->college_id);
        // Mail::send(new ApplyMail($request->all()));
        return redirect()->back()->with('status','APPLY Sucessfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function deletemessage($message_id)
    {
        $message = Message::where('id',$message_id)->first();
        $message->delete();
        return back()->with('status', 'message has been successfully delete!');
    }

    public function showmessage($id)
    {
        $data = Message::find($id);
        return view('backend.pages.message.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $message = Message::find($id);
        $message->name = $request->name;
        $message->email = $request->email;
        $message->contact = $request->contact;
        $message->message = $request->message;
        $message->education = $request->education;
        $message->course_id = $request->course_id;
        $message->college_id = $request->college_id;
        $message->save();
        return $this->index()->with('status','message Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */

    // update Status
    public function messagestatus($id){
        $message = Message::findorfail($id);
        if($message != null){
            if($message->status == 'active'){
                $message->status = 'inactive';
            }else{
                $message->status = 'active';
            }
            $message->save();
            return back()->with('success','Status Updated Succesfully !');
        }else{
            return back()->with('error','Sorry message Didnot Found.');
        }
    }
}
