@extends('backend.layout.master')
@section('title', 'Edit-Category')
@section('main-content')

<div class="container-fluid  dashboard-content">

    <div class="row">
        <div class="col-md-6 mx-auto col-12">
            <div class="card">
                <h5 class="card-header">Update Category</h5>
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
                    <form action="{{ route('category.update', $data['id']) }}" id="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="catname">Category name</label>
                            <input type="text" value="{{$data['name']}}" name="name" class="form-control" id="catname12"
                                placeholder="name">
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <label for="catname">Slug</label>-->
                        <!--    <input type="text" value="{{$data['slag']}}" name="slag" class="form-control" id="catname12"-->
                        <!--        placeholder="slug">-->
                        <!--</div>-->
                        <div class="form-group">
                            <label for="catname">Course Name</label>
                            <input type="text" value="{{$data['name']}}" name="name" class="form-control" id="catname12"
                                placeholder="">
                        </div>
                        {{-- <div class="form-group">
                            <label for="catname">Course Slug</label>
                            <input type="text" value="{{$data['slag']}}" name="slag" class="form-control"
                        id="catname12" placeholder="slug">
                </div> --}}
                <div class="form-group">
                    <label for="catname">Course Duration</label>
                    <input type="text" value="{{$data['totalyear']}}" name="totalyear" class="form-control"
                        id="catname12" placeholder="">
                </div>
                <div class="form-group">
                    <label for="catname">Course Export</label>
                    <input type="text" value="{{$data['export']}}" name="export" class="form-control" id="catname12"
                        placeholder="">
                </div>
                <div class="form-group">
                    <label for="catname">Training Mode</label>
                    <select name="training_mode" id="training_mode" class="form-control">
                        <option value="On-site" {{ $data['training_mode'] == 'On-site' ? 'selected' : '' }}>On-site
                        </option>
                        <option value="Online" {{ $data['training_mode'] == 'Online' ? 'selected' : '' }}>Online
                        </option>
                        <!-- option for both also -->
                        <option value="Both, On-site And Online"
                            {{ $data['training_mode'] == 'Both, On-site And Online' ? 'selected' : '' }}>Both, On-site
                            And Online</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="catname"> Syllabus </label>
                    <input type="file" name="syllabus" placeholder="" autocomplete="off" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image"> Course Thumbnail </label>
                    <input type="file" value="{{$data['image']}}" name="image" placeholder="" autocomplete="off"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="catname"> Course Description </label>
                    <textarea type="text" name="description" class="form-control" id="summernote"
                        placeholder="description">{{ $data['description'] }}</textarea>
                </div>
                <div class="row">
                    <div class="col-sm-12 pl-0">
                        <p class="text-center">
                            <button type="submit" name="submit" class="btn btn-space btn-primary">update</button>
                            <a href="{{ url('/admin/category') }}" class="btn btn-space btn-danger"> Back </a>
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