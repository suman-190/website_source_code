@extends('backend.layout.master')
@section('title', 'Add Subcategory')
@section('main-content')

<div class="container-fluid  dashboard-content">

    <div class="row">
        <div class="col-md-6 mx-auto col-12">
            <div class="card">
                <h5 class="card-header">Add Subcategory</h5>
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
                    <form action="{{ route('subcategory.store') }}" id="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="subcategorysubcategory"> Select Category </label>
                            <select name="category" id="category" class="form-control">
                                @foreach ($category as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="catname">Course Type</label>
                            <select name="type" class="form-control" id="catname12">
                                <option value="" selected>-- Select One --</option>
                                <option value="Civil Engineering">civil Engineering</option>
                                <option value="Computer Engineering">Computer Engineering</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="catname">Course Name</label>
                            <input type="text" name="name" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="catname">Course Slug</label>
                            <input type="text" name="slag" class="form-control" id="catname12" placeholder="slug">
                        </div>
                        <div class="form-group">
                            <label for="catname">Course Duration</label>
                            <input type="text" name="totalyear" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="catname">Course Export</label>
                            <input type="text" name="export" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="catname">Training Mode</label>
                            <select name="training_mode" id="training_mode" class="form-control">
                                <option value="On-site">On-site</option>
                                <option value="Online">Online</option>
                                <!-- option for both also -->
                                <option value="Both, On-site And Online">Both, On-site And Online</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="catname"> Syllabus </label>
                            <input type="file" name="syllabus" placeholder="" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="image"> Course Thumbnail </label>
                            <input type="file" name="image" placeholder="" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="catname"> Course Description </label>
                            <textarea type="text" name="description" class="form-control" id="summernote"
                                placeholder="description"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 pl-0">
                                <p class="text-center">
                                    <button type="submit" name="submit" class="btn btn-space btn-primary">Add</button>
                                    <a href="{{ url('/admin/subcategory') }}" class="btn btn-space btn-danger"> Back
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