@extends('backend.layout.master')
@section('title', 'Edit College')
@section('main-content')

<div class="container-fluid  dashboard-content">

    <div class="row">
        <div class="col-md-6 mx-auto col-12">
            <div class="card">
                <h5 class="card-header text-center">Edit College</h5>
                @error('name')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                @error('email')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                @error('phone')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                @error('password')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                @error('role')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('status') }}</strong>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('college.update', $data['id']) }}" id="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="catname">College Name</label>
                            <input type="text" value="{{$data['name']}}"  name="name" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="image"> College Image </label>
                            <input type="file"  value="{{$data['image']}}" name="image" placeholder="" autocomplete="off" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Courses"> Select Courses </label>
                            <select name="courses[]" multiple id="Courses" class="form-control">
                                @foreach ($cources as $cource)
                                <option value="{{ $cource->id }}"
                                    @foreach ($college->courses as $clz)
                                         {{ $clz->id == $cource->id ? 'selected' : '' }}
                                    @endforeach
                                    >{{ $cource->name }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="catname">Export</label>
                            <input type="text" value="{{$data['export']}}"  name="export" class="form-control" id="catname12" placeholder">
                        </div>
                        <div class="form-group">
                            <label for="catname">Collge Description</label>
                            <input type="text" value="{{$data['description']}}"  name="description" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="catname">State</label>
                            <input type="text"  value="{{$data['state']}}" name="state" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="catname">City</label>
                            <input type="text" value="{{$data['city']}}"  name="city" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="catname">Location</label>
                            <input type="text" value="{{$data['address']}}"  name="address" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="catname">Email</label>
                            <input type="text" value="{{$data['email']}}"  name="email" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="catname">Features</label>
                            <textarea type="text"  name="collegefeatures" class="form-control" id="summernote" placeholder="collegefeatures">{{$data['collegefeatures']}}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 pl-0">
                                <p class="text-center">
                                    <button type="submit" name="submit" class="btn btn-space btn-primary">Add</button>
                                    <a href="{{ url('/admin/college') }}" class="btn btn-space btn-danger"> Back </a>
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
