
@extends('backend.layout.master')
@section('title', 'Newslaya - No.1 Nepal News Portal' )
@section('main-content')

<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    {{-- <th> SN </th> --}}
                                    <th> Ads Title </th>
                                    <th> Ads ID </th>
                                    <th> Total Views </th>
                                    <th> Total Clicks </th>
                                    <th> Url </th>
                                    <th> Created At </th>
                                    <th> Display To</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($ads)
                                <tr>
                                    <td> {{ $ads->title }} </td>
                                    <td> {{ $ads->id }} </td>
                                    <td> {{ $ads->viewcount }} </td>
                                    <td> {{ $ads->clickcount }} </td>
                                    <td> {{ $ads->url }} </td>
                                    <td> {{ $ads->created_at }} </td>
                                    <td> {{ $ads->display_to }} </td>
                                </tr>
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
