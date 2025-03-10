@extends('backend.layout.master')
@section('title', 'Edit Banner')
@section('main-content')

    <div class="container-fluid  dashboard-content">

        <div class="row">
            <div class="col-md-6 mx-auto col-12">
                <div class="card">
                    <h5 class="card-header text-center">Edit Question</h5>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('admin.question.update', $edit->id) }}" id="" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="question_type">Question Type</label>
                                <select class="form-control" name="question_type" id="question_type">
                                    <option value="reading" {{ $edit->question_type == 'reading' ? 'selected' : '' }}>
                                        Reading
                                    </option>
                                    <option value="listening" {{ $edit->question_type == 'listening' ? 'selected' : '' }}>
                                        Listening</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exam_set_id">Exam Set</label>
                                <select class="form-control" required name="exam_set_id" id="exam_set_id">
                                    <option value="">Select Exam Set</option>
                                    @foreach (App\Models\ExamSet::where('status', 'active')->get() as $examset)
                                        <option value="{{ $examset->id }}"
                                            {{ $edit->exam_set_id == $examset->id ? 'selected' : '' }}>{{ $examset->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="catname">Question Title</label>
                                <textarea type="text" name="question_title" class="form-control" id="summernote" placeholder="Set Name">{{ $edit->question_title }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image"> Question Image </label>
                                <input type="file" name="question_image" placeholder="" autocomplete="off"
                                    class="form-control">
                            </div>
                            @if ($edit->question_image)
                                <img src="{{ asset($edit->question_image) }}" class="img-fluid rounded-circle"
                                    style="max-width:100px">
                            @endif
                            <div class="form-group">
                                <label for="image"> Question Audio </label>
                                <input type="file" name="question_audio" placeholder="" autocomplete="off"
                                    class="form-control">
                            </div>
                            @if ($edit->question_audio)
                                <audio src="{{ asset($edit->question_audio) }}" controls></audio>
                            @endif
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="active" {{ $edit->status == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ $edit->status == 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                            </div>


                            <h1>Answers</h1>
                            <div class="jumbotron p-2">
                                <h4>First Option</h4>
                                @php
                                    $answer = $edit
                                        ->answers()
                                        ->where('answer_index', 0)
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="catname">Answer Title</label>
                                    <input type="text" name="answer_title[0]" class="form-control" id="catname12"
                                        value="{{ $answer ? $answer->answer_title : '' }}" placeholder="Set Name">
                                </div>
                                <div class="form-group">
                                    <label for="image"> Answer Image </label>
                                    <input type="file" name="answer_image[0]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                                @if ($answer->answer_image)
                                    <img src="{{ asset($answer->answer_image) }}" class="img-fluid rounded-circle"
                                        style="max-width:100px">
                                @endif
                                <div class="form-group">
                                    <label for="image"> Answer Audio </label>
                                    <input type="file" name="answer_audio[0]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                                @if ($answer->answer_audio)
                                    <audio src="{{ asset($answer->answer_audio) }}" controls></audio>
                                @endif
                            </div>
                            <hr>
                            <div class="jumbotron p-2">
                                <h4>Second Option</h4>
                                @php
                                    $answer = $edit
                                        ->answers()
                                        ->where('answer_index', 1)
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="catname">Answer Title</label>
                                    <input type="text" name="answer_title[1]" class="form-control" id="catname12"
                                        value="{{ $answer ? $answer->answer_title : '' }}" placeholder="Set Name">
                                </div>
                                <div class="form-group">
                                    <label for="image"> Answer Image </label>
                                    <input type="file" name="answer_image[1]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                                @if ($answer->answer_image)
                                    <img src="{{ asset($answer->answer_image) }}" class="img-fluid rounded-circle"
                                        style="max-width:100px">
                                @endif
                                <div class="form-group">
                                    <label for="image"> Answer Audio </label>
                                    <input type="file" name="answer_audio[1]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                                @if ($answer->answer_audio)
                                    <audio src="{{ asset($answer->answer_audio) }}" controls></audio>
                                @endif
                            </div>
                            <hr>

                            <div class="jumbotron p-2">
                                <h4>Third Option</h4>
                                @php
                                    $answer = $edit
                                        ->answers()
                                        ->where('answer_index', 2)
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="catname">Answer Title</label>
                                    <input type="text" name="answer_title[2]" class="form-control" id="catname12"
                                        value="{{ $answer ? $answer->answer_title : '' }}" placeholder="Set Name">
                                </div>
                                <div class="form-group">
                                    <label for="image"> Answer Image </label>
                                    <input type="file" name="answer_image[2]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                                @if ($answer->answer_image)
                                    <img src="{{ asset($answer->answer_image) }}" class="img-fluid rounded-circle"
                                        style="max-width:100px">
                                @endif
                                <div class="form-group">
                                    <label for="image"> Answer Audio </label>
                                    <input type="file" name="answer_audio[2]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                                @if ($answer->answer_audio)
                                    <audio src="{{ asset($answer->answer_audio) }}" controls></audio>
                                @endif
                            </div>
                            <hr>
                            <div class="jumbotron p-2">
                                <h4>Fourth Option</h4>
                                @php
                                    $answer = $edit
                                        ->answers()
                                        ->where('answer_index', 3)
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="catname">Answer Title</label>
                                    <input type="text" name="answer_title[3]" class="form-control" id="catname12"
                                        value="{{ $answer ? $answer->answer_title : '' }}" placeholder="Set Name">
                                </div>
                                <div class="form-group">
                                    <label for="image"> Answer Image </label>
                                    <input type="file" name="answer_image[3]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                                @if ($answer->answer_image)
                                    <img src="{{ asset($answer->answer_image) }}" class="img-fluid rounded-circle"
                                        style="max-width:100px">
                                @endif
                                <div class="form-group">
                                    <label for="image"> Answer Audio </label>
                                    <input type="file" name="answer_audio[3]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                                @if ($answer->answer_audio)
                                    <audio src="{{ asset($answer->answer_audio) }}" controls></audio>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="correct_answer">Correct Answer</label>
                                <select class="form-control" required name="correct_answer" id="correct_answer">
                                    <option value="">Select One</option>
                                    <option value="0" {{ $edit->correct_answer == 0 ? 'selected' : '' }}>First Option
                                    </option>
                                    <option value="1"{{ $edit->correct_answer == 1 ? 'selected' : '' }}>Second Option
                                    </option>
                                    <option value="2"{{ $edit->correct_answer == 2 ? 'selected' : '' }}>Third Option
                                    </option>
                                    <option value="3"{{ $edit->correct_answer == 3 ? 'selected' : '' }}>Fourth Option
                                    </option>
                                </select>
                            </div>


                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit"
                                            class="btn btn-space btn-primary">Submit</button>
                                        <a href="{{ route('admin.question.index') }}" class="btn btn-space btn-danger">
                                            Back
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
