@extends('backend.layout.master')
@section('title', 'Exam Set')
@section('main-content')

    <div class="container-fluid  dashboard-content">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 text-center p-2"> Students </h5>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Name </th>
                                        <th> Date </th>
                                        <th> Address </th>
                                        <th> Phone Number </th>
                                        <th> Email Address </th>
                                        <th> Status </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($students)
                                        @foreach ($students as $user)
                                            <tr>
                                                <td> {{ $user->id }} </td>
                                                <td> {{ $user->name }} </td>
                                                <td> {{ $user->created_at }} </td>
                                                <td> {{ $user->address }} </td>
                                                <td> {{ $user->phone_number }} </td>
                                                <td> {{ $user->email_address }} </td>
                                                <td>
                                                    <div class="dropdown d-inline-block mb-1">
                                                        <button
                                                            class="btn btn-{{ $user->status == 'active' ? 'success' : 'danger' }} btn-sm"
                                                            type="button">
                                                            {{ $user->status }}
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('admin.student.edit', $user->id) }}" type="button"
                                                            data-toggle="tooltip" title=""
                                                            class="btn btn-link btn-primary" data-original-title="Edit">
                                                            <i class="fa fa-edit" style="color: white"></i>
                                                        </a>
                                                        {{-- <form action="{{ route('admin.student.destroy', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" data-toggle="tooltip" title=""
                                                                class="btn btn-link btn-danger" data-original-title="Remove">
                                                                <i class="fa fa-times" style="color: white"></i>
                                                            </button>
                                                        </form> --}}

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation">
                            {{ $students->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
