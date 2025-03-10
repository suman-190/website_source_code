
@extends('backend.layout.master')
@section('title', 'Add-Ads')
@section('main-content')

<div class="container-fluid  dashboard-content">
    @isset($adsposition)
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 text-center p-2"> {{ $adsposition->title }}</h5>
                    <a href="{{ url('/admin/ads/add')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add ads</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th> SN </th>
                                    <th> Ads Title </th>
                                    <th> Ads Image </th>
                                    <th> Ads Details </th>
                                    <th> Total Views </th>
                                    <th> Total Clicks </th>
                                    <th> Status </th>
                                    <th>Display to</th>
                                    <th>Action</th>
                                    <th> Url </th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($ads)
                                @foreach ($ads as $user)
                                <tr>
                                    <td>
                                        <span class="d-none">{{ $user->sn }}</span>
                                        <form class="form-inline d-flex" action="{{ route('ads.sn.update', $user->id) }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="number" class="form-control" value="{{ $user->sn }}" name="sn" style="width:80px">
                                            </div>
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-check-circle"></i></button>
                                         </form>
                                    </td>
                                    <td><a href="{{ route('adsdetail', $user->id) }}">{{  $user->title }}</a></td>
                                    <td>
                                        <a href="{{ route('adsdetail', $user->id) }}"><img src="{{asset($user->image_id)}}" class="img-fluid rounded-circle" style="max-width:50px;border-radius: 0px !important;" alt="{{$user->logo}}"></a>
                                    </td>
                                    <td> <a href="{{ route('adsdetail', $user->id) }}"><i class="fas fa-eye"></i></a> </td>
                                    <td> <a href="{{ route('adsdetail', $user->id) }}">{{ $user->viewcount }}</a> </td>
                                    <td> <a href="{{ route('adsdetail', $user->id) }}">{{ $user->clickcount }}</a> </td>
                                    <td>
                                        <div class="dropdown d-inline-block mb-1">
                                            <button class="btn btn-{{ (($user->status == 'active') ? 'success' : 'danger') }} dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                                {{ $user->status }}
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="/admin/ads/status/{{ $user->id }}">{{ (($user->status == 'active') ? 'Inactive' : 'Active') }}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td> {{ $user->display_to }} </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('ads.edit', $user->id) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Edit">
                                                <i class="fa fa-edit" style="color: white"></i>
                                            </a>
                                            <a href="{{ route('ads.delet', $user->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                <i class="fa fa-times" style="color: white"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td> <a href="{{ route('adsdetail', $user->id) }}">{{ $user->url }}</a> </td>
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
    @endisset

</div>

@endsection
