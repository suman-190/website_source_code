<?php
    $adspositions = App\Models\Adsposition::where('status', 'active')->get()
?>

@extends('backend.layout.master')
@section('title', 'Add-Ads')
@section('main-content')

<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-6 mx-auto col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 text-center p-2"> Ads Category</h5>
                 </div>
                 @isset($adspositions)
                 @foreach ($adspositions as $adsposition)
                <div class="card-header">
                    <a href="{{ route('adslist.list', $adsposition->id) }}" class="btn btn-primary btn-sm float-center" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> {{ $adsposition->title }}</a>
                </div>
                @endforeach
                @endisset
            </div>
        </div>
    </div>
</div>

{{-- <div class="container-fluid  dashboard-content">
    @isset($adspositions)
    @foreach ($adspositions as $adsposition)
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
                                    <th> Ads Image </th>
                                    <th> Url </th>
                                    <th> Total Views </th>
                                    <th> Total Clicks </th>
                                    <th> Status </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($adsposition->ads)
                                @foreach ($adsposition->ads as $user)
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
                                    <td>
                                        <img src="{{asset($user->post_image())}}" class="img-fluid rounded-circle" style="max-width:50px;border-radius: 0px !important;" alt="{{$user->logo}}">
                                    </td>
                                    <td> {{ $user->url }} </td>
                                    <td> {{ $user->viewcount }} </td>
                                    <td> {{ $user->clickcount }} </td>
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
    @endforeach
    @endisset

</div> --}}

@endsection
