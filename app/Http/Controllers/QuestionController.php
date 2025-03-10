<?php

namespace App\Http\Controllers;

use App\Imports\QuestionsImport;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::latest()->paginate(50);
        Paginator::useBootstrap();
        return view('backend.pages.question.index', compact('questions'));
    }

    public function setsQuestions(Request $request, $question)
    {
        // dd($request->id);
        $questions = Question::where('exam_set_id',$request->id)->latest()->paginate(50);
        Paginator::useBootstrap();
        return view('backend.pages.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.question.create');
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
            'question_title' => 'required|string|max:2000',
            'question_image' => 'nullable|image|max:2024|mimes:png,jpg,jpeg,gif,webp,svg',
            'question_audio' => 'nullable|file|max:9024',
            'question_type' => 'required|in:1 mark question,2 mark question',
            'status' => 'required|in:active,inactive',
            'exam_set_id' => 'required|exists:exam_sets,id',
            'correct_answer' => 'required|in:0,1,2,3',
        ]);
        $request->validate([
            'answer_title' => 'required|array',
            'answer_image' => 'nullable|array',
            'answer_audio' => 'nullable|array',
            'answer_title.*' => 'string|max:200',
            'answer_image.*' => 'image|max:2024|mimes:png,jpg,jpeg,gif,webp,svg',
            'answer_audio.*' => 'file|max:9024',
        ]);
        $data = [
            'question_title' => $request->question_title,
            'status' => $request->status,
            'exam_set_id' =>  $request->exam_set_id,
            'question_type' => $request->question_type,
            'correct_answer' => $request->correct_answer,
        ];
        $data['question_image'] = '';
        if ($request->file('question_image')) {
            $img_file = $request->file('question_image');
            $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
            $img_path = 'content/upload/question_image/';
            $success = $img_file->move($img_path, $img_name);
            $data['question_image'] = $img_path . $img_name;
        }
        $data['question_audio'] = '';
        if ($request->file('question_audio')) {
            $img_file = $request->file('question_audio');
            $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
            $img_path = 'content/upload/question_audio/';
            $success = $img_file->move($img_path, $img_name);
            $data['question_audio'] = $img_path . $img_name;
        }
        $question = Question::create($data);
        if ($request->answer_title) {
            if (isset($request->answer_title[0])) {
                $data = [
                    'answer_title' => $request->answer_title[0],
                    'answer_index' => 0,
                    'question_id' => $question->id,
                ];
                $data['answer_image'] = '';
                if (isset($request->file('answer_image')[0])) {
                    $img_file = $request->file('answer_image')[0];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_image/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_image'] = $img_path . $img_name;
                }
                $data['answer_audio'] = '';
                if (isset($request->file('answer_audio')[0])) {
                    $img_file = $request->file('answer_audio')[0];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_audio/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_audio'] = $img_path . $img_name;
                }
                Answer::create($data);
            }
            if (isset($request->answer_title[1])) {
                $data = [
                    'answer_title' => $request->answer_title[1],
                    'answer_index' => 1,
                    'question_id' => $question->id,
                ];
                $data['answer_image'] = '';
                if (isset($request->file('answer_image')[1])) {
                    $img_file = $request->file('answer_image')[1];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_image/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_image'] = $img_path . $img_name;
                }
                $data['answer_audio'] = '';
                if (isset($request->file('answer_audio')[1])) {
                    $img_file = $request->file('answer_audio')[1];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_audio/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_audio'] = $img_path . $img_name;
                }
                Answer::create($data);
            }
            if (isset($request->answer_title[2])) {
                $data = [
                    'answer_title' => $request->answer_title[2],
                    'answer_index' => 2,
                    'question_id' => $question->id,
                ];
                $data['answer_image'] = '';
                if (isset($request->file('answer_image')[2])) {
                    $img_file = $request->file('answer_image')[2];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_image/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_image'] = $img_path . $img_name;
                }
                $data['answer_audio'] = '';
                if (isset($request->file('answer_audio')[2])) {
                    $img_file = $request->file('answer_audio')[2];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_audio/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_audio'] = $img_path . $img_name;
                }
                Answer::create($data);
            }
            if (isset($request->answer_title[3])) {
                $data = [
                    'answer_title' => $request->answer_title[3],
                    'answer_index' => 3,
                    'question_id' => $question->id,
                ];
                $data['answer_image'] = '';
                if (isset($request->file('answer_image')[3])) {
                    $img_file = $request->file('answer_image')[3];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_image/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_image'] = $img_path . $img_name;
                }
                $data['answer_audio'] = '';
                if (isset($request->file('answer_audio')[3])) {
                    $img_file = $request->file('answer_audio')[3];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_audio/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_audio'] = $img_path . $img_name;
                }
                Answer::create($data);
            }
        }
        return redirect(route('admin.question.create'))->with('success', 'Question create successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($question)
    {
        $edit = Question::findorfail($question);
        return view('backend.pages.question.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $question)
    {
        $question = Question::findorfail($question);
        // dd($request->all());
        $request->validate([
            'question_title' => 'required|string|max:2000',
            'question_image' => 'nullable|image|max:2024|mimes:png,jpg,jpeg,gif,webp,svg',
            'question_audio' => 'nullable|file|max:9024',
            'question_type' => 'required|in:1 mark question,2 mark question',
            'status' => 'required|in:active,inactive',
            'exam_set_id' => 'required|exists:exam_sets,id',
            'correct_answer' => 'required|in:0,1,2,3',
        ]);
        $request->validate([
            'answer_title' => 'required|array',
            'answer_image' => 'nullable|array',
            'answer_audio' => 'nullable|array',
            'answer_title.*' => 'string|max:200',
            'answer_image.*' => 'image|max:2024|mimes:png,jpg,jpeg,gif,webp,svg',
            'answer_audio.*' => 'file|max:9024',
        ]);
        $data = [
            'question_title' => $request->question_title,
            'status' => $request->status,
            'exam_set_id' =>  $request->exam_set_id,
            'question_type' => $request->question_type,
            'correct_answer' => $request->correct_answer,
        ];
        $data['question_image'] = $question->question_image;
        if ($request->file('question_image')) {
            $img_file = $request->file('question_image');
            $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
            $img_path = 'content/upload/question_image/';
            $success = $img_file->move($img_path, $img_name);
            $data['question_image'] = $img_path . $img_name;
        }
        $data['question_audio'] = $question->question_audio;
        if ($request->file('question_audio')) {
            $img_file = $request->file('question_audio');
            $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
            $img_path = 'content/upload/question_audio/';
            $success = $img_file->move($img_path, $img_name);
            $data['question_audio'] = $img_path . $img_name;
        }
        $question->update($data);
        if ($request->answer_title) {
            if (isset($request->answer_title[0])) {
                $answer = $question->answers()->orderBy('answer_index', 'asc')->first();
                $data = [
                    'answer_title' => $request->answer_title[0],
                    'answer_index' => 0,
                    'question_id' => $question->id,
                ];
                $data['answer_image'] = $answer->answer_image;
                if (isset($request->file('answer_image')[0])) {
                    $img_file = $request->file('answer_image')[0];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_image/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_image'] = $img_path . $img_name;
                }
                $data['answer_audio'] = $answer->answer_audio;
                if (isset($request->file('answer_audio')[0])) {
                    $img_file = $request->file('answer_audio')[0];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_audio/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_audio'] = $img_path . $img_name;
                }
                $answer->update($data);
            }
            if (isset($request->answer_title[1])) {
                $answer = $question->answers()->orderBy('answer_index', 'asc')->skip(1)->first();
                $data = [
                    'answer_title' => $request->answer_title[1],
                    'answer_index' => 1,
                    'question_id' => $question->id,
                ];
                $data['answer_image'] = $answer->answer_image;
                if (isset($request->file('answer_image')[1])) {
                    $img_file = $request->file('answer_image')[1];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_image/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_image'] = $img_path . $img_name;
                }
                $data['answer_audio'] = $answer->answer_audio;
                if (isset($request->file('answer_audio')[1])) {
                    $img_file = $request->file('answer_audio')[1];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_audio/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_audio'] = $img_path . $img_name;
                }
                $answer->update($data);
            }
            if (isset($request->answer_title[2])) {
                $answer = $question->answers()->orderBy('answer_index', 'asc')->skip(2)->first();
                $data = [
                    'answer_title' => $request->answer_title[2],
                    'answer_index' => 2,
                    'question_id' => $question->id,
                ];
                $data['answer_image'] = $answer->answer_image;
                if (isset($request->file('answer_image')[2])) {
                    $img_file = $request->file('answer_image')[2];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_image/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_image'] = $img_path . $img_name;
                }
                $data['answer_audio'] = $answer->answer_audio;
                if (isset($request->file('answer_audio')[2])) {
                    $img_file = $request->file('answer_audio')[2];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_audio/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_audio'] = $img_path . $img_name;
                }
                $answer->update($data);
            }
            if (isset($request->answer_title[3])) {
                $answer = $question->answers()->orderBy('answer_index', 'asc')->skip(3)->first();
                $data = [
                    'answer_title' => $request->answer_title[3],
                    'answer_index' => 3,
                    'question_id' => $question->id,
                ];
                $data['answer_image'] = $answer->answer_image;
                if (isset($request->file('answer_image')[3])) {
                    $img_file = $request->file('answer_image')[3];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_image/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_image'] = $img_path . $img_name;
                }
                $data['answer_audio'] = $answer->answer_audio;
                if (isset($request->file('answer_audio')[3])) {
                    $img_file = $request->file('answer_audio')[3];
                    $img_name = 'qn' . Str::random(2) . now()->format('Y-m-d-his') . '.' . $img_file->getClientOriginalExtension();
                    $img_path = 'content/upload/answer_audio/';
                    $success = $img_file->move($img_path, $img_name);
                    $data['answer_audio'] = $img_path . $img_name;
                }
                $answer->update($data);
            }
        }
        return redirect(route('admin.question.index'))->with('success', 'Exam set updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($question)
    {
        $question = Question::findorfail($question);
        $question->delete();
        return redirect(route('admin.question.index'))->with('success', 'Exam set deleted successfully!');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        Excel::import(new QuestionsImport, $request->file('file'));

        return redirect()->back()->with('success', 'Questions imported successfully.');
    }
}
