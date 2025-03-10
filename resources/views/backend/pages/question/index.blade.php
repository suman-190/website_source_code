@extends('backend.layout.master')
@section('title', 'Exam Set')
@section('main-content')

    <div class="container-fluid  dashboard-content">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 text-center p-2"> Question </h5>
                        <a href="{{ route('admin.question.create') }}" class="btn btn-primary btn-sm float-right"
                            data-toggle="tooltip" data-placement="bottom" title="Add Question"><i class="fas fa-plus"></i> Add
                            Question</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Exam Set</th>
                                        <th> Type </th>
                                        <th> Question </th>
                                        <th> Correct Answer </th>
                                        <th> Answers </th>
                                        <th> Status </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($questions)
                                        @foreach ($questions as $user)
                                            <tr>
                                                <td> {{ $user->id }} </td>
                                                <td> {{ $user->examset ? $user->examset->name : '' }} </td>
                                                <td> {{ Str::ucfirst($user->question_type) }} </td>
                                                <td>
                                                    <h5 style="max-width: 300px">{!! $user->question_title !!}</h5>
                                                    @if ($user->question_image)
                                                        <img src="{{ asset($user->question_image) }}"
                                                            class="img-fluid rounded-circle" style="max-width:100px">
                                                    @endif
                                                    @if ($user->question_audio)
                                                        <audio src="{{ asset($user->question_audio) }}" controls></audio>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge badge-primary">{{ $user->correctanswer ? $user->correctanswer->answer_title : '' }}</span>
                                                </td>
                                                <td>
                                                    @foreach ($user->answers as $answer)
                                                        <ol class="list-group">
                                                            <li class="list-group-item bg-info text-light active">
                                                                <h5 style="max-width: 300px">{{ $answer->answer_title }}</h5>
                                                                @if ($answer->answer_image)
                                                                    <img src="{{ asset($answer->answer_image) }}"
                                                                        class="img-fluid rounded-circle"
                                                                        style="max-width:100px">
                                                                @endif
                                                                @if ($answer->answer_audio)
                                                                    <audio src="{{ asset($answer->answer_audio) }}"
                                                                        controls></audio>
                                                                @endif
                                                            </li>
                                                        </ol>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div class="dropdown d-inline-block mb-1">
                                                        <button
                                                            class="btn btn-{{ $user->status == 'active' ? 'success' : 'danger' }} btn-sm"
                                                            type="button">
                                                            {{ $user->status }}
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('admin.question.edit', $user->id) }}" type="button"
                                                            data-toggle="tooltip" title=""
                                                            class="btn btn-link btn-primary" data-original-title="Edit">
                                                            <i class="fa fa-edit" style="color: white"></i>
                                                        </a>
                                                        <form action="{{ route('admin.question.destroy', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" data-toggle="tooltip" title=""
                                                                class="btn btn-link btn-danger" data-original-title="Remove">
                                                                <i class="fa fa-times" style="color: white"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                                {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
