<?php

namespace App\Http\Controllers;

use App\Models\ExamSet;
use App\Models\StudentReasult;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExamSetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get the exam sets
        $examsets = ExamSet::query();

        // Filter by subject if provided
        if ($request->has('subject') && $request->subject) {
            $examsets->where('subject_id', $request->subject);
        }

        // Get the filtered results
        $examsets = $examsets->get();

        // Pass the request data (type and subject) to the view
        return view('backend.pages.examset.index', [
            'examsets' => $examsets,
            'selectedType' => $request->type, // Pass the selected type to the view
            'selectedSubject' => $request->subject, // Pass the selected subject to the view
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.examset.create');
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
            'name' => 'required|string|max:200|unique:exam_sets,name',
            'image' => 'nullable|image|max:2024|mimes:png,jpg,jpeg,gif,webp,svg',
            'status' => 'required|in:active,inactive',
            'time_period' => 'required|numeric',
            'start_from' => 'nullable|date',
            'end_on' => 'nullable|date',
            'subject_id'=> 'exists:categories,id',
        ]);
        $data = $request->all();
        $data['image'] = '';
        if ($request->file('image')) {
            $img_file = $request->file('image');
            $img_name = 'set' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
            $img_path = 'content/upload/exam/';
            $success = $img_file->move($img_path, $img_name);
            $data['image'] = $img_path . $img_name;
        }
        ExamSet::create($data);
        return redirect(route('admin.examset.index'))->with('success', 'Exam set create successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamSet  $examSet
     * @return \Illuminate\Http\Response
     */
    public function show(ExamSet $examSet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamSet  $examSet
     * @return \Illuminate\Http\Response
     */
    public function edit($examSet)
    {
        $edit = ExamSet::findorfail($examSet);
        return view('backend.pages.examset.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamSet  $examSet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $examSet)
    {
        $examSet = ExamSet::findorfail($examSet);
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:200|unique:exam_sets,name,' . $examSet->id,
            'image' => 'nullable|image|max:2024|mimes:png,jpg,jpeg,gif,webp,svg',
            'status' => 'required|in:active,inactive',
            'time_period' => 'required|numeric',
            'start_from' => 'nullable|date',
            'end_on' => 'nullable|date',
            'subject_id'=> 'exists:categories,id',
        ]);
        $data = $request->all();
        $data['image'] = $examSet->image;
        if ($request->file('image')) {
            $img_file = $request->file('image');
            $img_name = 'set' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
            $img_path = 'content/upload/exam/';
            $success = $img_file->move($img_path, $img_name);
            $data['image'] = $img_path . $img_name;
        }
        $examSet->update($data);
        return redirect(route('admin.examset.index'))->with('success', 'Exam set updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamSet  $examSet
     * @return \Illuminate\Http\Response
     */
    public function destroy($examSet)
    {
        $examSet = ExamSet::findorfail($examSet);
        $examSet->delete();
        return redirect(route('admin.examset.index'))->with('success', 'Exam set deleted successfully!');
    }

    public function getSets(Request $request)
    {
        $examsets = ExamSet::where('status', 'active')->get();
        return response()->json([
            'status' => true,
            'examsets' => $examsets,
        ]);
    }


    public function setsReview($id)
    {
        $set = ExamSet::findorfail($id);
        $sets = StudentReasult::where('set_id', $id)->get();
        return view('backend.pages.examset.setsreview', compact('sets'));
    }

    public function setsReviewDetail($id, $reasult_id)
    {
        $set = ExamSet::findorfail($id);
        $reasult = StudentReasult::findorfail($reasult_id);
        return view('backend.pages.examset.questionsreview', compact('set', 'reasult'));
    }
}
