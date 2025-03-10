@extends('backend.layout.master')
@section('title', 'Add User')
@section('main-content')

<div class="container-fluid  dashboard-content">

    <div class="row">
        <div class="col-md-6 mx-auto col-12">
            <div class="card">
                <h5 class="card-header">Add Links</h5>
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
                    <form action="{{ route('links.update', $data['id']) }}" id="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="catname">Facebook Url</label>
                            <input type="text" value="{{$data['facebook']}}"  name="facebook" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="catname">Whatsapp Url</label>
                            <input type="text" value="{{$data['whatsapp']}}"  name="whatsapp" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="catname">Instagram Url</label>
                            <input type="text" value="{{$data['instagram']}}"  name="instagram" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="catname">Twitter Url</label>
                            <input type="text" value="{{$data['twitter']}}"  name="twitter" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="catname">Youtube Url</label>
                            <input type="text" value="{{$data['youtube']}}"  name="youtube" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="catname">Linkedin Url</label>
                            <input type="text" value="{{$data['linkedin']}}"  name="linkedin" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="row">
                            <div class="col-sm-12 pl-0">
                                <p class="text-center">
                                    <button type="submit" name="submit" class="btn btn-space btn-primary">Add</button>
                                    <a href="{{ url('/admin/links') }}" class="btn btn-space btn-danger"> Back </a>
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
