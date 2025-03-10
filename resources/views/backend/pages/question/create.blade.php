@extends('backend.layout.master')
@section('title', 'Add Question')
@section('main-content')
<style>
    .sn-brd{
        border: solid 2px rgb(127, 127, 127);
        background: rgb(235, 235, 235);
    }
</style>

    <div class="container-fluid  dashboard-content">

        <div class="row">
            <div class="col-md-8 mx-auto col-12">
                <div class="card">
                    <h5 class="card-header text-center">Add Question</h5>
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
                    <form method="POST" action="{{ route('admin.question.import') }}" class="card-body p-3 sn-brd" enctype="multipart/form-data     ">
                        @csrf
                        <label for="file">Import Question (Suported: xlsx,csv,xls)</label>
                        <input required type="file" name="file" id="file" class="form-control">
                        <button class="btn btn-primary mt-3" type="submit">Import</button>
                    </form>
                    <div class="card-body">
                        <form action="{{ route('admin.question.store') }}" id="" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="question_type">Question Type</label>
                                <select class="form-control" name="question_type" id="question_type">
                                    <option value="1 mark question">1 mark question</option>
                                    <option value="2 mark question">2 mark question</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exam_set_id">Exam Set</label>
                                <select class="form-control" required name="exam_set_id" id="exam_set_id">
                                    <option value="">Select Exam Set</option>
                                    @foreach (App\Models\ExamSet::where('status', 'active')->get() as $examset)
                                        <option value="{{ $examset->id }}">{{ $examset->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="catname">Question Title</label>
                                <textarea type="text" id="summernote" name="question_title" class="form-control" placeholder="Set Name"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image"> Question Image </label>
                                <input type="file" name="question_image" placeholder="" autocomplete="off"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image"> Question Audio </label>
                                <input type="file" name="question_audio" placeholder="" autocomplete="off"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>


                            <h1>Answers</h1>
                            <div class="jumbotron p-2">
                                <h4>First Option</h4>
                                <div class="form-group">
                                    <label for="catname">Answer Title</label>
                                    <input type="text" name="answer_title[0]" class="form-control" id="catname12"
                                        placeholder="Set Name">
                                </div>
                                <div class="form-group">
                                    <label for="image"> Answer Image </label>
                                    <input type="file" name="answer_image[0]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="image"> Answer Audio </label>
                                    <input type="file" name="answer_audio[0]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                            </div>
                            <hr>
                            <div class="jumbotron p-2">
                                <h4>Second Option</h4>
                                <div class="form-group">
                                    <label for="catname">Answer Title</label>
                                    <input type="text" name="answer_title[1]" class="form-control" id="catname12"
                                        placeholder="Set Name">
                                </div>
                                <div class="form-group">
                                    <label for="image"> Answer Image </label>
                                    <input type="file" name="answer_image[1]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="image"> Answer Audio </label>
                                    <input type="file" name="answer_audio[1]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                            </div>
                            <hr>

                            <div class="jumbotron p-2">
                                <h4>Third Option</h4>
                                <div class="form-group">
                                    <label for="catname">Answer Title</label>
                                    <input type="text" name="answer_title[2]" class="form-control" id="catname12"
                                        placeholder="Set Name">
                                </div>
                                <div class="form-group">
                                    <label for="image"> Answer Image </label>
                                    <input type="file" name="answer_image[2]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="image"> Answer Audio </label>
                                    <input type="file" name="answer_audio[2]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                            </div>
                            <hr>
                            <div class="jumbotron p-2">
                                <h4>Fourth Option</h4>
                                <div class="form-group">
                                    <label for="catname">Answer Title</label>
                                    <input type="text" name="answer_title[3]" class="form-control" id="catname12"
                                        placeholder="Set Name">
                                </div>
                                <div class="form-group">
                                    <label for="image"> Answer Image </label>
                                    <input type="file" name="answer_image[3]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="image"> Answer Audio </label>
                                    <input type="file" name="answer_audio[3]" placeholder="" autocomplete="off"
                                        class="form-control">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="correct_answer">Correct Answer</label>
                                <select class="form-control" required name="correct_answer" id="correct_answer">
                                    <option value="">Select One</option>
                                    <option value="0">First Option</option>
                                    <option value="1">Second Option</option>
                                    <option value="2">Third Option</option>
                                    <option value="3">Fourth Option</option>
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
