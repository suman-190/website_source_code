@extends('backend.layout.master')
@section('title', 'Edit-Ads')
@section('main-content')

<div class="container-fluid  dashboard-content">

    <form action="{{ route('ads.update', $data['id']) }}" id="" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <h5 class="card-header">Headerads Section</h5>
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
                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->headeradsimage)}}" class="img-fluid" style="width:100%" alt="{{$user->headeradsimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <label for="image">Header Ads</label>
                                <input type="file" name="headeradsimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Headerads Url</label>
                                <input type="text" name="headerads" value="{{$data['headerads']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <h5 class="card-header">1. Body Ads Section - First</h5>
                    <div class="card-body">
                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->badsoneimage)}}" class="img-fluid" style="width:100%" alt="{{$user->badsoneimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="badsoneimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="badsone" value="{{$data['badsone']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">2. Body Ads Section - Second</h5>
                    <div class="card-body">
                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->badstwoimage)}}" class="img-fluid" style="width:100%" alt="{{$user->badstwoimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="badstwoimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="badstwo" value="{{$data['badstwo']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">3. Body Ads Section - Third</h5>
                    <div class="card-body">
                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->badsthreeimage)}}" class="img-fluid" style="width:100%" alt="{{$user->badstwoimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="badsthree" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="badsthreeimage" value="{{$data['badsthreeimage']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">4. Body Ads Section - Fourth</h5>
                    <div class="card-body">
                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->badsfourimage)}}" class="img-fluid" style="width:100%" alt="{{$user->badsfourimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="badsfourimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="badsfour" value="{{$data['badsfour']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">5. Body Ads Section - Fifth</h5>
                    <div class="card-body">
                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->badsfiveimage)}}" class="img-fluid" style="width:100%" alt="{{$user->badsfiveimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="badsfiveimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="badsfive" value="{{$data['badsfive']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">6. Body Ads Section - Fifth</h5>
                    <div class="card-body">
                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->badssiximage)}}" class="img-fluid" style="width:100%" alt="{{$user->badsfiveimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="badssiximage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="badssix" value="{{$data['badssix']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">7. Body Ads Section - Fifth</h5>
                    <div class="card-body">
                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->badssevenimage)}}" class="img-fluid" style="width:100%" alt="{{$user->badssevenimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="badssevenimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="badsseven" value="{{$data['badsseven']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">8. Body Ads Section - Fifth</h5>
                    <div class="card-body">
                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->badseightimage)}}" class="img-fluid" style="width:100%" alt="{{$user->badseightimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="badseightimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="badseight" value="{{$data['badseight']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">9. Body Ads Section - Fifth</h5>
                    <div class="card-body">
                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->badsnineimage)}}" class="img-fluid" style="width:100%" alt="{{$user->badsnineimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="badsnineimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="badsnine" value="{{$data['badsnine']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">10. Body Ads Section - Fifth</h5>
                    <div class="card-body">
                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->badstenimage)}}" class="img-fluid" style="width:100%" alt="{{$user->badstenimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="badstenimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="badsten" value="{{$data['badsten']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <h5 class="card-header">1. Side Ads Section - First</h5>
                    <div class="card-body">

                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->sadsoneimage)}}" class="img-fluid" style="width:100%" alt="{{$user->sadsoneimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="sadsoneimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname"> Url</label>
                                <input type="text" name="headerads" value="{{$data['sadsone']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">2. Side Ads Section - Second</h5>
                    <div class="card-body">

                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->sadstwoimage)}}" class="img-fluid" style="width:100%" alt="{{$user->sadsoneimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="sadstwoimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="sadstwo" value="{{$data['sadsone']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">3. Side Ads Section - Third</h5>
                    <div class="card-body">

                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->sadsthreeimage)}}" class="img-fluid" style="width:100%" alt="{{$user->sadsthreeimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="sadsthreeimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="sadsthree" value="{{$data['sadsone']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">4. Side Ads Section - Fourth</h5>
                    <div class="card-body">

                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->sadsfourimage)}}" class="img-fluid" style="width:100%" alt="{{$user->sadsthreeimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="sadsfourimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="sadsfour" value="{{$data['sadsone']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">5. Side Ads Section - Fifth</h5>
                    <div class="card-body">

                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->sadsfiveimage)}}" class="img-fluid" style="width:100%" alt="{{$user->sadsfiveimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="sadsfiveimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="sadsfive" value="{{$data['sadsfive']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">6. Side Ads Section - Sixth</h5>
                    <div class="card-body">

                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->sadsiximage)}}" class="img-fluid" style="width:100%" alt="{{$user->sadsfiveimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="sadsiximage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="sadsix" value="{{$data['sadsix']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">7. Side Ads Section - Seventh</h5>
                    <div class="card-body">

                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->sadssevenimage)}}" class="img-fluid" style="width:100%" alt="{{$user->sadsfiveimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="sadssevenimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="sadsseven" value="{{$data['sadsseven']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">8. Side Ads Section - Eight</h5>
                    <div class="card-body">

                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->sadseightimage)}}" class="img-fluid" style="width:100%" alt="{{$user->sadseightimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="sadseightimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="sadseight" value="{{$data['sadseight']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">9. Side Ads Section - Eight</h5>
                    <div class="card-body">

                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->sadsnineimage)}}" class="img-fluid" style="width:100%" alt="{{$user->sadsnineimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="sadsnineimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="sadsnine" value="{{$data['sadsnine']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">10. Side Ads Section - Eight</h5>
                    <div class="card-body">

                            @isset($ads)
                            @foreach ($ads as $user)
                            <img src="{{asset($user->sadstenimage)}}" class="img-fluid" style="width:100%" alt="{{$user->sadstenimage}}">
                            @endforeach
                            @endisset

                            <div class="form-group">
                                <input type="file" name="sadstenimage" placeholder="" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="catname">Url</label>
                                <input type="text" name="sadsten" value="{{$data['sadsten']}}" class="form-control" id="catname12" placeholder="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{ url('/admin/ads') }}" class="btn btn-space btn-danger"> Back </a>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</form>

</div>

@endsection
