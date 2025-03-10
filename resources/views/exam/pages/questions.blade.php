@extends('exam.layouts.mastersec')
@section('title', 'Questions')
@section('styles')
    <style>
        body{
            background: white;
        }
    .modal-lg {
        max-width: 95% !important;
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
            height: 15px;
            width: 15px;
        }

        .sn-player {
            padding: 10px 0;
            position: relative;
        }

        .modal {
            overflow-y: scroll;
        }
        h5{
            line-height: initial;
        }
        .pageheader-title{
            font-size: 18px !important;
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
        .backimage {
        position: relative;
        }

        .backimage::before {
        content: "";
        background-image: url(''); /* URL to your image */
        background-size: cover; /* Adjust the sizing as needed */
        background-repeat: no-repeat;
        background-position: center center;
        opacity: 0.07; /* Adjust the opacity here (0.5 for 50% opacity) */
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        }
        .sn-questionsGroup-set, #submitReasult{
            display: none
        }
        .sn-active{
            display: block;
        }
        .sn-img{
            height: 80px;
        }
        .sn-term-codition{
            height: 100%;
            width: 100%;
            position: fixed;
            display: block;
            left: 0%;
            top: 0;
            padding: 30px 0px;
            z-index: 99999999999999999999999;
            background: white;
        }
        .sn-term-accept-btns{
            margin-top: 20px;
        }
        .sn-head-qn{
            display: flex;
            background: #004aad;
            padding: 10px;
            margin-bottom: 0;
            color: white;
        }
        .sn-qn-l{
            width: 65px;
            /* background: black; */
        }
        .sn-qn-r{
            width: calc(100% - 60px);
            display: flex;
        }
        .sn-qn-r p span{
            color:white !important;
        }
    </style>
@endsection
@section('main-content')

@php
    $whereInArray = ['1 mark question','2 mark question'];
@endphp
<div class="sn-term-codition">
    <div class="container">
        <div class="card">
            <h4 class="card-header">
                Instructions
            </h4>
            <div class="card-body">
                <ul>
                    <li>
                        <div>&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque beatae fugiat, tenetur rerum doloribus, eius deserunt, tempora voluptatem laborum corrupti cum eum dignissimos perferendis dolores consequatur! Quibusdam atque aperiam deleniti.</div>
                    </li>
                    <li>
                        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque beatae fugiat, tenetur rerum doloribus, eius deserunt, tempora voluptatem laborum corrupti cum eum dignissimos perferendis dolores consequatur! Quibusdam atque aperiam deleniti. &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    </li>
                    <li>
                        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque beatae fugiat, tenetur rerum doloribus, eius deserunt, tempora voluptatem laborum corrupti cum eum dignissimos perferendis dolores consequatur! Quibusdam atque aperiam deleniti. &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    </li>
                    <li>
                        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque beatae fugiat, tenetur rerum doloribus, eius deserunt, tempora voluptatem laborum corrupti cum eum dignissimos perferendis dolores consequatur! Quibusdam atque aperiam deleniti. &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    </li>
                    <li>
                        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque beatae fugiat, tenetur rerum doloribus, eius deserunt, tempora voluptatem laborum corrupti cum eum dignissimos perferendis dolores consequatur! Quibusdam atque aperiam deleniti. &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    </li>
                </ul>
            {{-- </div>
            <div class="card-footer"> --}}
                <div class="sn-term-accept-btns">
                    <a href="{{ route('exam.sets') }}" class="btn btn-danger">Decline</a>
                    <a href="javascript:void(0);" class="btn btn-success sn-ac-btn">Accept</a>
                </div>
            </div>
        </div>
</div>
</div>
    <div class="container dashboard-content">
        <div class="row">
            <div class="col-md-4">

                <img src="/ui/images/logo_set.png" class="sn-img" alt="Line Academy - Logo">
            </div>
            <div class="col-md-8">
                <div class="d-flex sn-bordered py-2" style="max-width: 400px; margin-left: auto; background: #004aad;color:white;">
                    <img src="{{ asset(Auth::user()->image) }}" alt="" style="
                        background: white; height: 100%;   max-height: 85px;
                        margin-right: 10px;
                        margin-left: 10px;
                        ">
                    <div class="row">
                        <div class="col-12">
                            Name: {{ Auth::user()->name }}
                        </div>
                        <div class="col-12 ">
                            Set: {{ $set->name }}
                        </div>
                        <input type="hidden" id="qn_count_total" value="{{ $set->questions()->whereIn('question_type', $whereInArray)->limit(60)->count() }}">
                        <div class="col-12 ">
                            Total Questions: {{ $set->questions()->whereIn('question_type', $whereInArray)->limit(60)->count() }}
                        </div>
                        <div class="col-12 ">
                            Attempted: <span id="attempted_qn">0</span>
                        </div>
                    </div>
                </div>
                <div class="page-header mb-0 d-flex w-100">
                    <h2 class="pageheader-title mt-2 ml-auto"> Questions (Time Left: <span class="sn-datecounter"></span>)</h2>
                </div>
            </div>
            <div class="col-12">
                <h3 class="text-center mb-0">
                    Nepal Engineering Council License Mock Test
                </h3>
            </div>
        </div>
        <div class="bg-light">
            @if ($set)
                <input type="hidden" id="sId" value="{{ $set->id }}">
                <div class="jumbotron p-2" style="background: white;">

                    @php
                        $counter = 0;
                    @endphp
                    <div class="row" id="qn_container">
                        <div class="col-md-12">
                            <div>
                                @php
                                    $m1QnGroupSet = $set->questions()
                                        ->where('question_type', $whereInArray[0])
                                        ->inRandomOrder()
                                        ->limit(60)
                                        ->get()
                                        ->chunk(20);

                                    $m2QnGroupSet = $set->questions()
                                        ->where('question_type', $whereInArray[1])
                                        ->inRandomOrder()
                                        ->limit(20)
                                        ->get()
                                        ->chunk(20);
                                        // Conditionally merge the sets if m2QnGroupSet has items
                                    // if (!$m1QnGroupSet->isEmpty()) {
                                    //     // Merge both sets if m2QnGroupSet is not empty
                                    //     $groupSets = $m1QnGroupSet->merge($m2QnGroupSet);
                                    // } else {
                                    //     // If m2QnGroupSet is empty, just use m1QnGroupSet
                                    //     $groupSets = $m1QnGroupSet;
                                    // }
                                @endphp
                                @foreach ($m1QnGroupSet as $key=>$groupQuestions)
                                    <div class="sn-questionsGroup-set {{ $key == 0 ? 'sn-active' : '' }} py-3 " style="padding-bottom: 0 !important;" data-counter="{{ $key }}">
                                        @foreach ($groupQuestions as $question)
                                            @php
                                                $counter = $counter + 1;
                                            @endphp

                                            <div class="row mb-3">
                                                <div class="col-12 px-0 backimage">
                                                    <h4 class="d-flex sn-counterRecord sn-head-qn" counter="{{ $question->id }}">
                                                        <div class="sn-qn-r">
                                                            <span class="pr-2">[{{ $counter }}]</span>{!! $question->question_title !!}
                                                        </div><span class="ml-auto sn-qn-l">({{ $question->question_type == "2 mark question" ? "2 Mark" : "1 Mark" }})</span>
                                                    </h4>
                                                    @if ($question->question_image)
                                                        <img src="{{ asset($question->question_image) }}"
                                                            class="img-fluid " style="max-width:300px;">
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
                                                <div class="col-12 sn-bordered backimage pt-3">
                                                    @foreach ($question->answers()->inRandomOrder()->limit(4)->get() as $akey => $answer)
                                                        <ol class="mb-0 pl-0">
                                                            <li class="-item bg-light text-light d-flex">

                                                                <div>
                                                                    <div class="form-check pl-0">
                                                                        <input type="radio"
                                                                            class="sn-radio-input custom-control-label"
                                                                            name="answer{{ $counter }}"
                                                                            question-id={{ $question->id }}
                                                                            id=""
                                                                            value="{{ $answer->answer_index }}">

                                                                    </div>
                                                                </div>
                                                                <div class="pl-4">

                                                                    <h5 style="max-width: 300px">
                                                                        {{ $answer->answer_title }}</h5>
                                                                    @if ($answer->answer_image)
                                                                        <img src="{{ asset($answer->answer_image) }}"
                                                                            class="img-fluid "
                                                                            style="max-width:300px;">
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
                                        @endforeach
                                    </div>
                                @endforeach
                                @foreach ($m2QnGroupSet as $key=>$groupQuestions)
                                    <div class="sn-questionsGroup-set {{ $key == 0 ? 'sn-active' : '' }} py-3 " style="padding-bottom: 0 !important;" data-counter="{{ $key }}">
                                        @foreach ($groupQuestions as $question)
                                            @php
                                                $counter = $counter + 1;
                                            @endphp

                                            <div class="row mb-3">
                                                <div class="col-12 px-0 backimage">
                                                    <h4 class="d-flex sn-counterRecord sn-head-qn" counter="{{ $question->id }}">
                                                        <div class="sn-qn-r">
                                                            <span class="pr-2">[{{ $counter }}]</span>{!! $question->question_title !!}
                                                        </div><span class="ml-auto sn-qn-l">({{ $question->question_type == "2 mark question" ? "2 Mark" : "1 Mark" }})</span>
                                                    </h4>
                                                    @if ($question->question_image)
                                                        <img src="{{ asset($question->question_image) }}"
                                                            class="img-fluid " style="max-width:300px;">
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
                                                <div class="col-12 sn-bordered backimage pt-3">
                                                    @foreach ($question->answers()->inRandomOrder()->limit(4)->get() as $akey => $answer)
                                                        <ol class="mb-0 pl-0">
                                                            <li class="-item bg-light text-light d-flex">

                                                                <div>
                                                                    <div class="form-check pl-0">
                                                                        <input type="radio"
                                                                            class="sn-radio-input custom-control-label"
                                                                            name="answer{{ $counter }}"
                                                                            question-id={{ $question->id }}
                                                                            id=""
                                                                            value="{{ $answer->answer_index }}">

                                                                    </div>
                                                                </div>
                                                                <div class="pl-4">

                                                                    <h5 style="max-width: 300px">
                                                                        {{ $answer->answer_title }}</h5>
                                                                    @if ($answer->answer_image)
                                                                        <img src="{{ asset($answer->answer_image) }}"
                                                                            class="img-fluid "
                                                                            style="max-width:300px;">
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
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="py-2 d-flex">
                                <button name="" id="snPrev" class="btn btn-primary"
                                    role="button" disabled><i class="fas fa-angle-left"></i> Prev</button>
                                <button name="" id="snNext" class="btn btn-success ml-auto"
                                    role="button">Next <i class="fas fa-angle-right"></i></button>
                                <button type="button" name="" id="submitReasult"
                                    class="btn btn-success btn-sm ml-auto">Submit</button>
                            </div>
                        </div>
                        <input type="hidden" id="intervalD" value="{{ $set->time_period }}">
                    </div>
                </div>
                <div class="jumbotron bg-light p-2" id="reasultDisplay">

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
    <script src="{{ asset('assets/js/cs.js') }}"></script>
    <script>
        let isDialogShown = false;

        if (window.opener) {
            document.addEventListener("visibilitychange", () => {
                if (document.hidden && !isDialogShown) {
                    isDialogShown = true;
                     alert("Your exam has been canceled.");
                    window.close();
                }
            });
        }
    </script>


@endsection
