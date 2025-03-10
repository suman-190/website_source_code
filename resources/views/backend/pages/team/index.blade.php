@extends('backend.layout.master')
@section('title', 'Team Members')
@section('main-content')

<div class="container-fluid dashboard-content">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Team Members</h5>

                <!-- Success Message -->
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('success') }}</strong>
                </div>
                @endif

                <div class="card-body">
                    <a href="{{ route('admin.team.create') }}" class="btn btn-primary mb-3">Add New Team Member</a>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($teamMembers as $teamMember)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $teamMember->name }}</td>
                                    <td>{{ $teamMember->role }}</td>
                                    <td>
                                        @if ($teamMember->photo_path)
                                            <img src="{{ asset($teamMember->photo_path) }}" alt="Photo" width="100">
                                        @else
                                            No Photo
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.team.edit', $teamMember->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.team.destroy', $teamMember->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this team member?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Team Members Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
