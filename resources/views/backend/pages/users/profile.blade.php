@extends('backend.layout.master')

@section('title', 'Profile')
<style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      outline: none;
    }
    html,
    body {
      background-color: #fafafa;
    }
    .box-surface {
      margin: 100px 0;
      box-shadow: 0 2px 4px 0 rgb(0 0 0/25%);
      background-color: white;
    }
    .row-padding {
      padding: 20px;
    }
    .pos-center {
      position: relative;
      padding: 40px 0;
    }
    .soul-wrap input{
      width: 100%;
      padding: 0 15px;
      height: 50px;
      background: #fff;
      border: 1px solid #e5e5e5;
      color: black;
      font-size: 14px;
      line-height: 42px;
      box-shadow: 0 0px 4px 0 rgb(0 0 0 / 15%);
    }
</style>

@section('main-content')

<div class="container">
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
    @error('image')
    <div class="alert alert-danger" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @enderror

    <div class="box-surface">
      <div class="row row-padding">
        <div class="col-md-6 text-center pos-center p-0">
          <img src="{{ asset($profile->image) }}" height="auto" width="100%">
        </div>
        <div class="col-md-6">
          <form method="{{route('admin.profile.update', $profile->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <button type="submit" class="btn btn-primary"> User Details </button>
              <div class="row p-2">
                <div row="col-md-12 mx-auto" style="width: 100%;">
                  <div class="form-group soul-wrap">
                    <input type="text" class="form-control" name="name" value="{{ $profile->name }}" disabled>
                  </div>
                </div>
                <div row="col-md-12 mx-auto" style="width: 100%;">
                    <div class="form-group soul-wrap">
                      <input type="email" class="form-control" name="email" value="{{ $profile->email }}" disabled>
                    </div>
                    <div row="col-md-12 mx-auto" style="width: 100%;">
                        <div class="form-group soul-wrap">
                          <input type="email" class="form-control" name="email" value="{{ $profile->phone }}" disabled>
                        </div>
                  </div>
                  <div row="col-md-12 mx-auto" style="width: 100%;">
                      <div class="form-group soul-wrap">
                        <input type="email" class="form-control" name="role" value="{{ $profile->role }}" disabled>
                      </div>
                    </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
