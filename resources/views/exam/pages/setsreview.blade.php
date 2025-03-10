@extends('exam.layouts.master')
@section('title', 'Exam Sets')
@section('main-content')


    <div class="container dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"> Exam Sets</h2>
                </div>
            </div>
        </div>
        <div class="bg-light">
            <table class="table ">
                <thead class="thead-inverse">
                    <tr>
                        <th>SN</th>
                        <th>SET</th>
                        <th>Attempt</th>
                        <th>Remark</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sets as $set)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td>{{ $set->examset->name }}</td>
                            <td>
                                <a href="{{ route('exam.sets.review.detail', [$set->examset->id, $set->id]) }}"
                                    class="btn btn-sm btn-success">Review</a>
                            </td>
                            <td>
                                Attempts: <span
                                    class="badge badge-primary">{{ $set->created_at->format('Y M d,  H:i A') }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
