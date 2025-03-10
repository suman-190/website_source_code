<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
        $students = Student::paginate(20);
        return view('backend.pages.students.index', compact('students'));
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
    public function store(Request $request)
    {
        if (Auth::user()->student) {
            return back()->with('success', 'You request already submitted before. Please contact the admin.!');
        }
        $request->validate([
            'name' => 'required|string|max:200',
            'address' => 'required|string|max:200',
            'email_address' => 'required|email',
            'phone_number' => 'required|numeric',
        ]);
        $data = $request->all();
        $data['status'] = 'active';
        $data['user_id'] = Auth::user()->id;
        Student::create($data);
        return back()->with('success', 'Request Sent successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($student)
    {
        $edit = Student::findorfail($student);
        return view('backend.pages.students.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student)
    {
        $student = Student::findOrFail($student);
        $request->validate([
            'name' => 'required|string|max:200',
            'address' => 'required|string|max:200',
            'email_address' => 'nullable|email|max:200',
            'phone_number' => 'nullable|numeric',
        ]);
        $data = $request->all();
        $student->update($data);
        return redirect(route('admin.student.index'))->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
