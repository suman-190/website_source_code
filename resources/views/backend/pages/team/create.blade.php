@extends('backend.layout.master')
@section('title', 'Add Team Member')
@section('main-content')

<div class="container-fluid dashboard-content">

    <div class="row">
        <div class="col-md-6 mx-auto col-12">
            <div class="card">
                <h5 class="card-header">Add Team Member</h5>

                <!-- Display Validation Errors -->
                @error('name')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                @error('role')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                @error('photo')
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
                    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter full name">
                        </div>

                        <!-- Role -->
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" name="role" class="form-control" id="role" placeholder="Enter role (e.g., Accountant)">
                        </div>

                        <!-- Photo -->
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" class="form-control" id="photo">
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-sm-12 pl-0">
                                <p class="text-center">
                                    <button type="submit" class="btn btn-space btn-primary">Add</button>
                                    <a href="{{ route('admin.team.index') }}" class="btn btn-space btn-danger">Back</a>
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
