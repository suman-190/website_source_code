<?php

namespace App\Http\Controllers;

use App\Models\ExamSet;
use App\Models\Question;
use App\Models\ReasultReview;
use App\Models\StudentReasult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function form()
    {
        if (Auth::user()->student) {
            if (Auth::user()->student->status == 'active') {
                return redirect(route('exam.sets'));
            }else{
                return redirect(route('home'))->with('success', 'You request already submitted before. Please contact the admin.!');
            }
        }
        return view('exam.pages.form');
    }
    public function sets(Request $request)
    {
        // Static subject lists
        $subjectListForLoksewa = [
            ["id" => 267, "name" => "NEA-Electrical Engineer Level 7"],
            ["id" => 268, "name" => "NEA-Electrical Supervisor Level 5"],
            ["id" => 269, "name" => "NEA-Computer Engineer Level 7"],
            ["id" => 270, "name" => "NEA-Civil Engineer Level 7"],
            ["id" => 271, "name" => "Computer Engineer/Computer Officer"],
            ["id" => 272, "name" => "Computer Operator"],
        ];

        $subjectListForNEB = [
            ["id" => 76, "name" => "Civil Engineering (ACiE)"],
            ["id" => 77, "name" => "Mechanical Engineering (AMeE)"],
            ["id" => 78, "name" => "Electrical Engineering (AEIE)"],
            ["id" => 79, "name" => "Electrical and Electronics Engineering (AEEE)"],
            ["id" => 80, "name" => "Computer Engineering (ACtE)"],
            ["id" => 81, "name" => "Electronics and Communication Engineering (AExE)"],
            ["id" => 82, "name" => "Electronics, Communication and Information Engineering (AEiE)"],
            ["id" => 83, "name" => "Information Technology Engineering (AItE)"],
            ["id" => 141, "name" => "Architecture Engineering (AArc)"],
        ];

        // Determine which list to use
        $subjects = [];
        $user = Auth::user();
        // dd($user);
        $type = $user->user_type;
        if ($type == null){
            $type = $request->type;
        }
        if ($type) {
            if ($type == 'Loksewa') {
                $subjects = $subjectListForLoksewa;
            } elseif ($type == 'NEC') {
                $subjects = $subjectListForNEB;
            }else{
                abort(404);
            }
        }else{
            return view("exam.pages.sets");
        }
        $subjectId = $user->subject_id != null ? $user->subject_id : $request->subject_id;
        if ($subjectId) {
            $sets = ExamSet::where(['subject_id' => $subjectId,'status' => 'active'])->get();
            return view('exam.pages.sets', compact( 'type','sets', 'subjectId'));
        }
        return view('exam.pages.sets', compact( 'subjects', 'type', 'subjectId'));
    }

    public function setsReview($id)
    {
        $set = ExamSet::findorfail($id);
        $sets = StudentReasult::where('student_id', Auth::user()->student->id)->where('set_id', $id)->get();
        return view('exam.pages.setsreview', compact('sets'));
    }
    public function questions($id)
    {
        $check = Auth::user()->student->setrequest()->where('set_id', $id)->where('is_approved', 1)->first();
        if (!$check) {
            return redirect(route('exam.sets'));
            // abort(404);
        }
        $set = ExamSet::where(['id' => $id, 'status' => 'active'])->first();
        return view('exam.pages.questions', compact('set'));
    }
    public function setsReviewDetail($id, $reasult_id)
    {
        $set = ExamSet::findorfail($id);
        $reasult = StudentReasult::findorfail($reasult_id);
        // dd($reasult->reasultreview()->count());
        return view('exam.pages.questionsreview', compact('set', 'reasult'));
    }
    public function checkReasult(Request $request)
    {
        $set = ExamSet::where(['id' => $request->sid, 'status' => 'active'])->first();
        $submitted = $request->submitted;
        $all_questions = $request->questions;
        if ($set == null || $submitted == null || $all_questions == null) {
            return response()->json([
                'status' => false,
                'message' => "set or submitted or questions any of these are null"
            ]);
        }
        $check = Auth::user()->student->setrequest()->where('set_id', $set->id)->where('is_approved', 1)->first();
        if (!$check) {
            return response()->json([
                'status' => false,
                'check' => $check,
            ]);
        }

        $set_attempte_no = StudentReasult::where('set_id', $set->id)->where('student_id', Auth::user()->student->id)->orderBy('attempt', 'desc')->first();
        $attempt_qn = count($submitted);
        $no_of_correct = 0;
        $obtainedMark = 0;

        // for student reasult
        $data = [
            'student_id' => Auth::user()->student->id,
            'set_id' => $set->id,
            'attempt' => ($set_attempte_no ? $set_attempte_no->attempt + 1 : 1)
        ];
        $studentreasult = StudentReasult::create($data);

        foreach ($all_questions as $question_id) {
            $is_correct = 0;
            $given_answer = 0;
            $is_attempted = 0;
            $question = Question::find($question_id);
            if ($question == null) {
                return response()->json([
                    'status' => false,
                    'question' => $question,
                ]);
            }
            foreach ($submitted as $sub) {
                $qn_id = $sub['id'];
                if ($qn_id == $question_id) {
                    if (isset($sub['value'])) {
                        $given_answer = $sub['value'];
                        if ($question->correct_answer == $sub['value']) {
                            if($question->question_type == '2 mark question'){
                                $obtainedMark += 2;
                            }else{
                                $obtainedMark += 1;
                            }
                            $is_correct = 1;
                            $no_of_correct += 1;
                        }
                    }
                    $is_attempted = 1;
                }
            }

            // for student attempted questions
            $data = [
                'question_id' => $question_id,
                'given_answer' => $given_answer,
                'is_correct' => $is_correct,
                'student_reasult_id' => $studentreasult->id,
                'attempt' => $is_attempted
            ];
            ReasultReview::create($data);
        }



        return response()->json([
            'status' => true,
            'correct_answer' => $no_of_correct,
            'attempt_qn' => $attempt_qn,
            'subbmitted' => $submitted,
            'reasult' => $studentreasult,
            'obtainedMark' => $obtainedMark,
        ]);
    }
}
