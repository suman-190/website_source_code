@extends('backend.layout.master')
@section('title', 'Edit Banner')
@section('main-content')

    <div class="container-fluid  dashboard-content">

        <div class="row">
            <div class="col-md-6 mx-auto col-12">
                <div class="card">
                    <h5 class="card-header text-center">Edit Set</h5>
                    @foreach ($errors as $error)
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
                        <form action="{{ route('admin.examset.update', $edit->id) }}" id="" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <select class="form-control" name="subject_id" id="subject">
                                    <option value="">Select Subject</option>
                                    <!-- Existing options -->
                                    <option value="267" {{ $edit->subject_id == 267 ? 'selected' : '' }}>NEA-Electrical Engineer Level 7 (Loksewa Preparation)</option>
                                    <option value="268" {{ $edit->subject_id == 268 ? 'selected' : '' }}>NEA-Electrical Supervisor Level 5 (Loksewa Preparation)</option>
                                    <option value="269" {{ $edit->subject_id == 269 ? 'selected' : '' }}>NEA-Computer Engineer Level 7 (Loksewa Preparation)</option>
                                    <option value="270" {{ $edit->subject_id == 270 ? 'selected' : '' }}>NEA-Civil Engineer Level 7 (Loksewa Preparation)</option>
                                    <option value="271" {{ $edit->subject_id == 271 ? 'selected' : '' }}>Computer Engineer/Computer Officer (Loksewa Preparation)</option>
                                    <option value="272" {{ $edit->subject_id == 272 ? 'selected' : '' }}>Computer Operator (Loksewa Preparation)</option>
                                    <!-- NEC License Preparation options -->
                                    <option value="76" {{ $edit->subject_id == 76 ? 'selected' : '' }}>Civil Engineering (ACiE)</option>
                                    <option value="77" {{ $edit->subject_id == 77 ? 'selected' : '' }}>Mechanical Engineering (AMeE)</option>
                                    <option value="78" {{ $edit->subject_id == 78 ? 'selected' : '' }}>Electrical Engineering (AEIE)</option>
                                    <option value="79" {{ $edit->subject_id == 79 ? 'selected' : '' }}>Electrical and Electronics Engineering (AEEE)</option>
                                    <option value="80" {{ $edit->subject_id == 80 ? 'selected' : '' }}>Computer Engineering (ACtE)</option>
                                    <option value="81" {{ $edit->subject_id == 81 ? 'selected' : '' }}>Electronics and Communication Engineering (AExE)</option>
                                    <option value="82" {{ $edit->subject_id == 82 ? 'selected' : '' }}>Electronics, Communication and Information Engineering (AEiE)</option>
                                    <option value="83" {{ $edit->subject_id == 83 ? 'selected' : '' }}>Information Technology Engineering (AItE)</option>
                                    <option value="141" {{ $edit->subject_id == 141 ? 'selected' : '' }}>Architecture Engineering (AArc)</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="catname">Set Name</label>
                                <input type="text" name="name" value="{{ $edit->name }}" class="form-control"
                                    id="catname12" placeholder="Set Name">
                            </div>
                            <div class="form-group">
                                <label for="image"> Banner Image </label>
                                <input type="file" name="image" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Time Duration (minute)</label>
                                <input type="number" name="time_period" value="{{ $edit->time_period }}"
                                    class="form-control" id="catname12" placeholder="Time Duration">
                            </div>
                            {{-- <div class="form-group">
                                <label for="catname">Start From</label>
                                <input type="datetime-local" name="start_from" value="{{ $edit->start_from }}"
                                    class="form-control" id="catname12" placeholder="Start Form">
                            </div>
                            <div class="form-group">
                                <label for="catname">End On</label>
                                <input type="datetime-local" name="end_on" value="{{ $edit->end_on }}" class="form-control"
                                    id="catname12" placeholder="Start Form">
                            </div> --}}
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="active" {{ $edit->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $edit->status == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit"
                                            class="btn btn-space btn-primary">Submit</button>
                                        <a href="{{ route('admin.examset.index') }}" class="btn btn-space btn-danger"> Back
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
