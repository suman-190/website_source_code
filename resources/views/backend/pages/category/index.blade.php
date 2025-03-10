@extends('backend.layout.master')
@section('title', 'Courses')
@section('main-content')

<div class="container-fluid  dashboard-content">

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 text-center p-2">Parent Courses </h5>
                    <a href="{{ url('/admin/category/add')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Courses</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="display: none;"> ID </th>
                                    <th> Courses name </th>
                                    <th> Courses Image </th>
                                    <th> Parent Courses </th>
                                    <th> Status </th>
                                    {{-- <th>Display Nav</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($category)
                                @foreach ($category as $user)
                                <tr>
                                    <td  style="display: none">
                                        {{ $user->id }}</span>
                                    </td>
                                    {{-- <td>
                                        <span class="d-none">{{ $user->sn }}</span>
                                        <form class="form-inline d-flex" action="{{ route('category.sn.update', $user->id) }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="number" class="form-control" value="{{ $user->sn }}" name="sn" style="width:80px">
                                            </div>
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-check-circle"></i></button>
                                         </form>
                                    </td> --}}
                                    <td> {{ $user ? $user->name : ''  }} </td>
                                    <td>
                                        <img src="{{asset($user->image)}}" class="img-fluid rounded-circle" style="max-width:50px" alt="{{$user->image}}">
                                    </td>
                                    <td> {{ $user ? ($user->category ? $user->category->name : '') : '' }}  </td>
                                    <td>
                                        <div class="dropdown d-inline-block mb-1">
                                            <button class="btn btn-{{ (($user->status == 'active') ? 'success' : 'danger') }} dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                                {{ $user->status }}
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="/admin/subcategory/status/{{ $user->id }}">{{ (($user->status == 'active') ? 'Inactive' : 'Active') }}</a>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- <td>
                                        <a href="{{ route('category.nav.display',$user->id) }}" class="btn btn-square btn-sm btn-{{ $user->display_nav == 1 ? 'success' : 'danger' }}">{{ $user->display_nav == 1 ? 'Yes' : 'No' }}</a>
                                    </td> --}}
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('category.edit', $user->id) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Edit">
                                                <i class="fa fa-edit" style="color: white"></i>
                                            </a>
                                            <!--<a href="{{ route('category.delet', $user->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">-->
                                            <!--    <i class="fa fa-times" style="color: white"></i>-->
                                            <!--</a>-->
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
</div>

@endsection
