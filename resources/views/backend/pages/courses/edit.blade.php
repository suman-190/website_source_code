@extends('backend.layout.master')
@section('title', 'Edit Course')
@section('main-content')

<div class="container-fluid  dashboard-content">

    <div class="row">
        <div class="col-md-6 mx-auto col-12">
            <div class="card">
                <h5 class="card-header">Add Banner</h5>
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
                    <form action="{{ route('courses.update', $data['id']) }}" id="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="catname">Course Name</label>
                            <input type="text"  value="{{$data['name']}}"   name="name" class="form-control" id="catname12" placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="catname"> Course Duration </label>
                            <input type="text"  value="{{$data['totalyear']}}"   name="totalyear" class="form-control" id="catname12" placeholder="3 year">
                        </div>
                        <div class="form-group">
                            <label for="image"> Course Thumbnail </label>
                            <input type="file"  value="{{$data['image']}}"   name="image" placeholder=""  class="form-control">
                            <img class="" src="{{ asset($data['image']) }}" height="75px" width="75px" alt="">
                        </div>
                        <div class="form-group">
                            <label for="catname"> Course Description </label>
                            <textarea type="text"  name="description" class="form-control" id="summernote" placeholder="description">{{$data['description']}}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 pl-0">
                                <p class="text-center">
                                    <button type="submit" name="submit" class="btn btn-space btn-primary">Add</button>
                                    <a href="{{ url('/admin/courses') }}" class="btn btn-space btn-danger"> Back </a>
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
