@extends('backend.layout.master')
@section('title', 'All Post')
@section('main-content')

<div class="container-fluid  dashboard-content">

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 text-center p-2"> Manage Every thing from Here </h5>
                    <a href="{{ url('/admin/post/add')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Post</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <!--<th> id </th>-->
                                    <th> action</th>
                                    <th> post_status </th>
                                    {{-- <th> Is BREAKING </th> --}}
                                    <th> post_title </th>
                                    <th> created_at </th>
                                    <th> post_image </th>
                                    <th> post_view </th>
                                    <th>view</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($post)
                                @foreach ($post as $user)
                                <tr>
                                    <!--<td> {{ $user->id }}</td>-->
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('post.edit', $user->id) }}" type="button" data-toggle="tooltip" title="" class="btn px-2 py-1 btn-sm btn-link btn-primary" data-original-title="Edit">
                                                <i class="fa fa-edit" style="color: white"></i>
                                            </a>
                                            <a href="{{ route('post.delet', $user->id) }}" data-toggle="tooltip" title="" class="btn px-2 py-1 btn-sm btn-link btn-danger" data-original-title="Remove">
                                                <i class="fa fa-times" style="color: white"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown d-inline-block mb-1">
                                            <button class="btn btn-{{ (($user->post_status == 'active') ? 'success' : 'danger') }} dropdown-toggle btn-sm  px-2 py-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                                {{ $user->post_status }}
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="/admin/post/status/{{ $user->id }}">{{ (($user->post_status == 'active') ? 'Inactive' : 'Active') }}</a>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td>
                                        <a href="{{ route('post.is_featured',$user->id) }}" class="btn btn-square btn-sm  px-2 py-1 btn-{{ $user->is_featured == 1 ? 'success' : 'danger' }}">{{ $user->is_featured == 1 ? 'Yes' : 'No' }}</a>
                                    </td> --}}
                                    <td> {{ Str::limit($user->post_title,30) }} </td>
                                    <td> {{ \carbon\Carbon::parse($user->created_at)->format('Y M d, h:i') }} </td>
                                    <td>
                                        <img src="{{asset($user->post_image)}}" class="img-fluid rounded-circle" style="max-width:50px" alt="{{$user->image}}">
                                    </td>
                                    <td> {{ $user->post_view }} </td>
                                    <td>
                                        <a href="" target="_blank"><i class="fas fa-eye"></i></a>
                                        {{-- <a href="{{ route('newsdetail',$user->post_slug) }}" target="_blank"><i class="fas fa-eye"></i></a> --}}
                                    </td>
                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                        {{ $post->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
