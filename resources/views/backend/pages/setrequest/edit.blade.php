@extends('backend.layout.master')
@section('title', 'Edit Banner')
@section('main-content')

    <div class="container-fluid  dashboard-content">

        <div class="row">
            <div class="col-md-6 mx-auto col-12">
                <div class="card">
                    <h5 class="card-header text-center">Edit Student</h5>
                    @foreach ($errors->all() as $error)
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
                        <form action="{{ route('admin.student.update', $edit->id) }}" id="" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="catname">Name</label>
                                <input type="text" name="name" value="{{ $edit->name }}" class="form-control"
                                    id="catname12" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="address"> Address </label>
                                <input type="text" name="address" placeholder="" value="{{ $edit->address }}"
                                    autocomplete="off" class="form-control" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label for="email_address"> Email Address </label>
                                <input type="email" name="email_address" placeholder="" value="{{ $edit->email_address }}"
                                    autocomplete="off" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <label for="phone_number"> Phone Number </label>
                                <input type="number" name="phone_number" placeholder="" value="{{ $edit->phone_number }}"
                                    autocomplete="off" class="form-control" placeholder="Phone Number">
                            </div>
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
                                        <a href="{{ route('admin.student.index') }}" class="btn btn-space btn-danger"> Back
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
