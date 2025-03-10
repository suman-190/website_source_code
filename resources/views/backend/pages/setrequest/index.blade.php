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
                                        <th> Student Name </th>
                                        <th> Set Name </th>
                                        <th> Request On </th>
                                        <th> Is Approved </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($requests)
                                        @foreach ($requests as $user)
                                            <tr>
                                                <td> {{ $user->id }} </td>
                                                <td> {{ $user->student->name }} </td>
                                                <td> {{ $user->set ? $user->set->name : '' }} </td>
                                                <td> <span
                                                        class="badge badge-primary">{{ $user->created_at->format('Y M d, H:i A') }}</span>
                                                </td>
                                                <td>
                                                    @if ($user->is_approved == 0)
                                                        <a href="#" class="btn btn-sm btn-danger"
                                                            id="ap{{ $loop->index }}"> <i class="fa fa-times"
                                                                aria-hidden="true"></i> </a>
                                                    @else
                                                        <a href="#" class="btn btn-sm btn-success"
                                                            id="ap{{ $loop->index }}"> <i class="fa fa-check-circle"
                                                                aria-hidden="true"></i> </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($user->is_approved == 0)
                                                        <a href="{{ route('admin.setrequest.status', [$user->id, 'approve']) }}"
                                                            class="btn btn-sm btn-info sn-approve-btn"
                                                            snref="#ap{{ $loop->index }}"
                                                            id="ck{{ $loop->index }}">Approve</a>
                                                    @endif
                                                    <form action="{{ route('admin.setrequest.destroy', $user->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" data-toggle="tooltip" title=""
                                                            class="btn btn-link btn-danger" data-original-title="Remove">
                                                            <i class="fa fa-times" style="color: white"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation">
                            {{ $requests->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $('.sn-approve-btn').click(function(e) {
            e.preventDefault();
            let href = $(this).attr('href');
            let snref = $(this).attr('snref');
            let thisId = $(this).attr('id');
            $.ajax({
                type: "get",
                url: href,
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        $(snref).empty();
                        $(snref).removeClass('btn-danger');
                        $(snref).addClass('btn-success');
                        $(snref).append('<i class="fa fa-check-circle"aria-hidden="true"></i>');
                        $('#' + thisId).remove();
                    } else {
                        alert('Something went wrong !');
                    }
                }
            });
        });
    </script>
@endsection
