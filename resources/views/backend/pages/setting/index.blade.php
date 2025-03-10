@extends('backend.layout.master')
@section('title', 'All Users')
@section('main-content')

<div class="container-fluid  dashboard-content">

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 text-center p-2"> Manage Every thing from Here </h5>
                    {{-- <a href="{{ url('/admin/carousel-add')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Update Your Site</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th> Main Logo </th>
                                    <th> Footer Logo </th>
                                    <th> AboutUs Page Image </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($setting)
                                @foreach ($setting as $user)
                                <tr>
                                    <td>
                                        <img src="{{asset($user->logo)}}" class="img-fluid rounded-circle" style="max-width:200px;border-radius: 0px !important;" alt="{{$user->logo}}">
                                    </td>
                                    <td>
                                        <img src="{{asset($user->footerlogo)}}" class="img-fluid rounded-circle" style="max-width:200px;border-radius: 0px !important;" alt="{{$user->footerlogo}}">
                                    </td>
                                    <td>
                                        <img src="{{asset($user->aboutuspageimage)}}" class="img-fluid rounded-circle" style="max-width:200px;border-radius: 0px !important;" alt="{{$user->aboutuspageimage}}">
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('setting.edit', $user->id) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Edit">
                                                <i class="fa fa-edit" style="color: white"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th> Address </th>
                                    <th> Contact </th>
                                    <th> Email </th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($setting)
                                @foreach ($setting as $user)
                                <tr>
                                    <td> {{ Str::limit($user->address,30) }} </td>
                                    <td> {{ Str::limit($user->contact,30) }} </td>
                                    <td> {{ Str::limit($user->email,30) }}</td>
                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th> Footer Logo </th>
                                    <th> Facebook Page </th>
                                    <th> Footer Description </th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($setting)
                                @foreach ($setting as $user)
                                <tr>
                                    <td>
                                        <img src="{{asset($user->footerlogo)}}"  class="img-fluid rounded-circle" style="max-width:200px;border-radius: 0px !important;"  alt="{{$user->footerlogo}}">
                                    </td>
                                    <td> {{ Str::limit($user->facebookpagefooter,100) }} </td>
                                    <td> {{ Str::limit($user->descriptionfooter,100) }} </td>
                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th> AboutUs Page Image </th>
                                    <th> AboutUs Page Description </th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($setting)
                                @foreach ($setting as $user)
                                <tr>
                                    <td>
                                        <img src="{{asset($user->aboutuspageimage)}}"  class="img-fluid rounded-circle" style="max-width:200px;border-radius: 0px !important;"  alt="{{$user->aboutuspageimage}}">
                                    </td>
                                    <td> {{ Str::limit($user->aboutpagedescription,100) }} </td>
                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
