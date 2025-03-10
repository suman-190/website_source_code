@extends('backend.layout.master')
@section('title', 'Add User')
@section('main-content')

<div class="container-fluid  dashboard-content">

    <div class="row">
        <div class="col-md-6 mx-auto col-12">
            <div class="card">
                <h5 class="card-header">Add message</h5>
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
                    <form action="{{ route('message.store') }}" id="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="catname">Full name</label>
                            <input type="text" name="name" class="form-control" id="catname12" placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="catname">Email</label>
                            <input type="text" name="email" class="form-control" id="catname12" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label for="catname">Contact</label>
                            <input type="text" name="contact" class="form-control" id="catname12" placeholder="contact">
                        </div>
                        <div class="form-group">
                            <label for="catname">message</label>
                            <textarea type="text" name="message" class="form-control" id="summernote" placeholder="message"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="catname">education</label>
                            <input type="text" name="education" class="form-control" id="catname12" placeholder="education">
                        </div>
                        <div class="form-group">
                            <label for="catname">course_id</label>
                            <input type="text" name="course_id" class="form-control" id="catname12" placeholder="course_id">
                        </div>
                        <div class="form-group">
                            <label for="catname">college_id</label>
                            <input type="text" name="college_id" class="form-control" id="catname12" placeholder="college_id">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="status">
                              <option value="">STATUS</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 pl-0">
                                <p class="text-center">
                                    <button type="submit" name="submit" class="btn btn-space btn-primary">Add</button>
                                    <a href="{{ url('/admin/message') }}" class="btn btn-space btn-danger"> Back </a>
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
