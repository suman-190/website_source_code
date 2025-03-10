@extends('backend.layout.master')
@section('title', 'Edit Success Story')
@section('main-content')

<div class="container-fluid dashboard-content">

    <div class="row">
        <div class="col-md-6 mx-auto col-12">
            <div class="card">
                <h5 class="card-header">Edit Success Story</h5>

                <!-- Display Validation Errors -->
                @error('name')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                @error('faculty')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                @error('college')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                @error('image')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                @error('description')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror

                <!-- Success Message -->
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('success') }}</strong>
                </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('admin.success_stories.update', $successStory->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $successStory->name }}" placeholder="Enter full name">
                        </div>

                        <!-- Faculty -->
                        <div class="form-group">
                            <label for="faculty">Faculty</label>
                            <input type="text" name="faculty" class="form-control" id="faculty" value="{{ $successStory->faculty }}" placeholder="Enter faculty">
                        </div>

                        <!-- College -->
                        <div class="form-group">
                            <label for="college">College</label>
                            <input type="text" name="college" class="form-control" id="college" value="{{ $successStory->college }}" placeholder="Enter college">
                        </div>

                        <!-- Image -->
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                            @if ($successStory->image)
                                <img src="{{ asset($successStory->image) }}" alt="Current Image" class="mt-2" width="100">
                            @endif
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="summernote" placeholder="Write a description">{{ $successStory->description }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-sm-12 pl-0">
                                <p class="text-center">
                                    <button type="submit" class="btn btn-space btn-primary">Update</button>
                                    <a href="{{ route('admin.success_stories.index') }}" class="btn btn-space btn-danger">Back</a>
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
