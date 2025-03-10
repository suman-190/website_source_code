@extends('backend.layout.master')
@section('title', 'Success Stories')
@section('main-content')

<div class="container-fluid dashboard-content">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Success Stories</h5>

                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('success') }}</strong>
                </div>
                @endif
                <div class="card-body">
                    <a href="{{ route('admin.success_stories.create') }}" class="btn btn-primary mb-3">Add New Success Story</a>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Faculty</th>
                                    <th>College</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($successStories as $successStory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $successStory->name }}</td>
                                    <td>{{ $successStory->faculty }}</td>
                                    <td>{{ $successStory->college }}</td>
                                    <td>
                                        @if ($successStory->image)
                                            <img src="{{ asset($successStory->image) }}" alt="Image" width="100">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.success_stories.edit', $successStory->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.success_stories.destroy', $successStory->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this story?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No Success Stories Found</td>
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
