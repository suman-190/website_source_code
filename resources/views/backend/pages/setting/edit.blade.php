@extends('backend.layout.master')
@section('title', 'Add User')
@section('main-content')

<div class="container-fluid  dashboard-content">

    <div class="row">
        <div class="col-md-6 mx-auto col-12">
            <div class="card">
                <h5 class="card-header">Add setting</h5>
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
                    <form action="{{ route('setting.update', $data['id']) }}" id="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image"> Logo </label>
                            <input type="file" name="logo" placeholder="" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="catname">Address </label>
                            <input type="text" value="{{$data['address']}}"  name="address" class="form-control" id="catname12" placeholder="address">
                        </div>
                        <div class="form-group">
                            <label for="catname"> Contact No. </label>
                            <input type="text" value="{{$data['contact']}}"  name="contact" class="form-control" id="catname12" placeholder="contact">
                        </div>
                        <div class="form-group">
                            <label for="catname">Email</label>
                            <input type="text" value="{{$data['email']}}"  name="email" class="form-control" id="catname12" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label for="image"> Footer Logo </label>
                            <input type="file" name="footerlogo" placeholder="" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="catname">Facebook Page Footer</label>
                            <input type="text"  value="{{$data['facebookpagefooter']}}"  name="facebookpagefooter" class="form-control" id="catname12" placeholder="facebookpagefooter">
                        </div>
                        <div class="form-group">
                            <label for="catname">Description Footer</label>
                            <input type="text" value="{{$data['descriptionfooter']}}"  name="descriptionfooter" class="form-control" id="catname12" placeholder="descriptionfooter">
                        </div>
                        <div class="form-group">
                            <label for="image"> About Us Page Image </label>
                            <input type="file" name="aboutuspageimage" placeholder="" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="catname">About Us Page Description</label>
                            <textarea type="text"  id="summernote"  name="aboutpagedescription" class="form-control" id="catname12" placeholder="aboutpagedescription">{{$data['aboutpagedescription']}}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 pl-0">
                                <p class="text-center">
                                    <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                    <a href="{{ url('/admin/setting') }}" class="btn btn-space btn-danger"> Back </a>
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
