@extends('exam.layouts.mastersec')
@section('title', 'Questions')
@section('styles')
    <style>
        .givven_answer {
            background-color: #fbb5b5 !important;
        }

        .correct_answer {
            background-color: #bafbb5 !important;
        }

        .sn-bordered {
            border: solid 1px #142167;
        }

        .sn-bordered h4 {
            border-bottom: solid 1px #142167;
        }

        .sn-circle-btn {
            border-radius: 50%;
            height: 40px;
            width: 40px;
            border: solid 2px #142167;
            color: #142167;
            margin-bottom: 10px;
            margin-right: 10px;
        }

        .sn-circle-btn.active {
            background: #142167;
            color: white
        }

        .sn-radio-input {
            display: inline-block !important;
            height: 40px;
            width: 40px;
        }

        .sn-player {
            padding: 10px 0;
            position: relative;
        }

        .modal {
            overflow-y: scroll;
        }

        .sn-player.played::before {
            content: "Played";
            color: white;
            position: absolute;
            padding: 32px 18px;
            left: 0;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            background: rgba(0, 0, 0, 0.64);
        }

        .sn-player.playing::after {
            content: "Playing";
            color: white;
            position: absolute;
            padding: 32px 18px;
            left: 0;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            background: rgba(0, 0, 0, 0.64);
        }

        .sn-bordered img.img-fluid {
            width: 100%;
        }
    </style>
@endsection
@section('main-content')


    <div class="container dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"> Questions </h2>
                </div>
            </div>
        </div>
        <div class="bg-light">
            @if ($set)
                <input type="hidden" id="sId" value="{{ $set->id }}">
                <div class="jumbotron p-2">
                    <div class="row">
                        <div class="col-md col-sm-6 sn-bordered">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="col-md col-sm-6 sn-bordered">
                            {{ $set->name }}
                        </div>
                        <input type="hidden" id="qn_count_total" value="{{ $reasult->reasultreview()->count() }}">
                        <div class="col-md col-sm-6 sn-bordered">
                            Total Questions: {{ $reasult->reasultreview()->count() }}
                        </div>
                        <div class="col-md col-sm-6 sn-bordered">
                            Attempted: <span
                                id="attempted_qn">{{ $reasult->reasultreview()->where('attempt', 1)->count() }}</span>
                        </div>
                    </div>
                    @php
                        $counter = 0;
                    @endphp
                    <div class="row" id="qn_container">
                        <div class="col-md-12 pt-4 pb-2 sn-bordered">
                            <div>
                                @foreach ($reasult->reasultreview as $detail)
                                    @php
                                        $question = $detail->question;
                                    @endphp
                                    @if ($question)
                                        @php
                                            $counter = $counter + 1;
                                        @endphp
                                        <button type="button"
                                            class="sn-circle-btn {{ $detail->given_answer ? 'active' : '' }}"
                                            data-toggle="modal" counter="{{ $question->id }}"
                                            nxCounter="{{ $counter }}"
                                            data-target="#qnModel{{ $counter }}">{{ $counter }}</button>

                                        <!-- Modal -->
                                        <div class="modal bd-example-modal-lg fade" id="qnModel{{ $counter }}"
                                            tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">{{ $set->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row">
                                                            <div class="col-md-6 sn-bordered">
                                                                <h4>{{ $counter }}. {!! $question->question_title !!}
                                                                </h4>
                                                                @if ($question->question_image)
                                                                    <img src="{{ asset($question->question_image) }}"
                                                                        class="img-fluid " style="max-width:100px">
                                                                @endif
                                                                @if ($question->question_audio)
                                                                    <div class="sn-player" refh="pb{{ $counter }}">
                                                                        <img src="{{ asset('assets/img/speaker.png') }}"
                                                                            width="80px" alt="" srcset="">
                                                                    </div>
                                                                    <audio class="playbox" id="pb{{ $counter }}"
                                                                        loop="false"
                                                                        src="{{ asset($question->question_audio) }}">
                                                                    </audio>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-6 sn-bordered">
                                                                @foreach ($question->answers as $akey => $answer)
                                                                    <ol class="list-group">
                                                                        <li
                                                                            class="list-group-item bg-light text-light d-flex  {{ $detail->given_answer == $answer->answer_index ? 'givven_answer' : '' }}  {{ $question->correct_answer == $answer->answer_index ? 'correct_answer' : '' }}">

                                                                            <div>
                                                                                <div class="form-check pl-0">
                                                                                    <input type="radio"
                                                                                        class="sn-radio-input custom-control-label"
                                                                                        disabled id=""
                                                                                        {{ $detail->given_answer == $answer->answer_index ? 'checked' : '' }}>

                                                                                </div>
                                                                            </div>
                                                                            <div class="pl-4">

                                                                                <h5 style="max-width: 300px">
                                                                                    {{ $answer->answer_title }}</h5>
                                                                                @if ($answer->answer_image)
                                                                                    <img src="{{ asset($answer->answer_image) }}"
                                                                                        class="img-fluid "
                                                                                        style="max-width:100px">
                                                                                @endif
                                                                                @if ($answer->answer_audio)
                                                                                    <div class="sn-player"
                                                                                        refh="pb{{ $counter . $akey }}">
                                                                                        <img src="{{ asset('assets/img/speaker.png') }}"
                                                                                            width="80px" alt=""
                                                                                            srcset="">
                                                                                    </div>
                                                                                    <audio class="playbox"
                                                                                        id="pb{{ $counter . $akey }}"
                                                                                        loop="false"
                                                                                        src="{{ asset($answer->answer_audio) }}">
                                                                                    </audio>
                                                                                @endif
                                                                            </div>
                                                                        </li>
                                                                    </ol>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary sn-btn-cancel"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary sn-btn-submit"
                                                            data-dismiss="modal" value="{{ $question->id }}"
                                                            nxValue="{{ $counter }}">Next</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12 sn-bordered">
                            <div class="py-2 d-flex">
                                <a name="" id="" class="btn btn-primary" href="{{ route('exam.sets') }}"
                                    role="button">Return Back</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="jumbotron bg-light p-2" id="reasultDisplay">
                    <div class="row">
                        <div class="col-md-6 mx-auto mt-4">
                            <ul class="list-group">
                                @php
                                    $total_qn = $reasult->reasultreview()->count();
                                    // dd($reasult->reasultreview);
                                    $total_attempt = $reasult
                                        ->reasultreview()
                                        ->where('attempt', 1)
                                        ->count();
                                    $total_correct = $reasult
                                        ->reasultreview()
                                        ->where('is_correct', 1)
                                        ->count();
                                    $res_with_question = $reasult
                                        ->reasultreview()
                                        ->where('is_correct', 1)
                                        ->get();
                                    $totalmarkCount = 0;
                                        foreach ($res_with_question as $review) {
                                            $question = $review->question;
                                            if($question){
                                                if($question->question_type == '2 mark question'){
                                                    $totalmarkCount += 2;
                                                }else{
                                                    $totalmarkCount += 1;
                                                }
                                            }
                                        }
                                    // dd($reasult->reasultreview);
                                @endphp
                                <li class="list-group-item active bg-danger">Reasult:
                                    {{ $total_qn }}/{{ $total_attempt }}
                                </li>
                                <li class="list-group-item">Total Questions: {{ $total_qn }}</li>
                                <li class="list-group-item">Total Attempt:
                                    {{ $total_attempt }}</li>
                                <li class="list-group-item">Not Attempt: {{ $total_qn - $total_attempt }}</li>
                                <li class="list-group-item">Incorrect Answer: {{ $total_attempt - $total_correct }}</li>
                                <li class="list-group-item active">Correct Answer: {{ $total_correct }}</li>
                                <li class="list-group-item active bg-success">Total Obtained Mark:
                                    {{ $totalmarkCount }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <div class="jumbotron">
                    <h1 class="display-3">404 not found</h1>
                    <p class="lead">Exam set you selected not found please go back and try again.</p>
                    <p class="lead">
                        <a class="btn btn-info btn-sm" href="{{ route('exam.sets') }}" role="button">Back</a>
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/csrev.js') }}"></script>

@endsection
