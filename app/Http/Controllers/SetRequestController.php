<?php

namespace App\Http\Controllers;

use App\Models\ExamSet;
use App\Models\SetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = SetRequest::latest()->paginate(30);
        return view('backend.pages.setrequest.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $set = ExamSet::findorfail($id);
        $student = Auth::user()->student;
        $data = [
            'set_id' => $set->id,
            'student_id' => $student->id
        ];
        SetRequest::create($data);
        return back()->with('success', 'Request Succesffully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SetRequest  $setRequest
     * @return \Illuminate\Http\Response
     */
    public function show(SetRequest $setRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SetRequest  $setRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(SetRequest $setRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SetRequest  $setRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SetRequest $setRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SetRequest  $setRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($setRequest)
    {
        $setRequest = SetRequest::findorfail($setRequest);
        $setRequest->delete();
        return back()->with('success', 'Deleted');
    }

    public function status($id, $status)
    {
        $setRequest = SetRequest::findorfail($id);
        if ($status == 'approve') {
            $setRequest->is_approved = 1;
            $save =  $setRequest->save();
            if ($save)
                return response()->json([
                    'status' => true,
                ]);
        }
        return response()->json([
            'status' => false,
        ]);
    }
}
