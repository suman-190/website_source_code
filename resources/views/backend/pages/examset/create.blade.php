@extends('backend.layout.master')
@section('title', 'Add Banner')
@section('main-content')

    <div class="container-fluid  dashboard-content">

        <div class="row">
            <div class="col-md-6 mx-auto col-12">
                <div class="card">
                    <h5 class="card-header text-center">Add Set</h5>
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
                        <form action="{{ route('admin.examset.store') }}" id="" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <select class="form-control" name="subject_id" id="subject">
                                    <option value="">Select Subject</option>
                                    <option value="267">NEA-Electrical Engineer Level 7 (Loksewa Preparation)</option>
                                    <option value="268">NEA-Electrical Supervisor Level 5 (Loksewa Preparation)</option>
                                    <option value="269">NEA-Computer Engineer Level 7 (Loksewa Preparation)</option>
                                    <option value="270">NEA-Civil Engineer Level 7 (Loksewa Preparation)</option>
                                    <option value="271">Computer Engineer/Computer Officer (Loksewa Preparation)</option>
                                    <option value="272">Computer Operator (Loksewa Preparation)</option>
                                    <option value="76">Civil Engineering (ACiE)</option>
                                    <option value="77">Mechanical Engineering (AMeE)</option>
                                    <option value="78">Electrical Engineering (AEIE)</option>
                                    <option value="79">Electrical and Electronics Engineering (AEEE)</option>
                                    <option value="80">Computer Engineering (ACtE)</option>
                                    <option value="81">Electronics and Communication Engineering (AExE)</option>
                                    <option value="82">Electronics, Communication and Information Engineering (AEiE)</option>
                                    <option value="83">Information Technology Engineering (AItE)</option>
                                    <option value="141">Architecture Engineering (AArc)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="catname">Set Name</label>
                                <input type="text" name="name" class="form-control" id="catname12"
                                    placeholder="Set Name">
                            </div>
                            <div class="form-group">
                                <label for="image"> Banner Image </label>
                                <input type="file" name="image" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Time Duration (minute)</label>
                                <input type="number" name="time_period" class="form-control" id="catname12"
                                    placeholder="Time Duration">
                            </div>
                            {{-- <div class="form-group">
                                <label for="catname">Start From</label>
                                <input type="datetime-local" name="start_from" class="form-control" id="catname12"
                                    placeholder="Start Form">
                            </div>
                            <div class="form-group">
                                <label for="catname">End On</label>
                                <input type="datetime-local" name="end_on" class="form-control" id="catname12"
                                    placeholder="Start Form">
                            </div> --}}
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
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
