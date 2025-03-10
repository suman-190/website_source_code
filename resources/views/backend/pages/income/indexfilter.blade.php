@extends('backend.layout.master')
@section('title', 'All Users')
@section('main-content')

<div class="container-fluid  dashboard-content">

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                    <h5 class="mb-0 text-center p-2"> All income Details </h5>
                    {{-- <a href="{{ url('/admin/expenses-add')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add New expenses</a> --}}
                    <hr>
                    <div class="card-body">
                        <form action="{{ route('income.filter') }}" id="" method="GET" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="catname">From</label>
                                <input type="date"   name="from" class="form-control" id="catname12" value="PPSG" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="catname">To</label>
                                <input type="date" name="to"   value="" class="form-control" id="catname12" placeholder="">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pl-0">
                                    <p class="text-center">
                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Filter</button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    {{-- <th> Id </th>s --}}
                                    <th> Date </th>
                                    <th> Amount </th>
                                    <th> Remark </th>
                                    <th> Full name </th>
                                    <th> Payment Method </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($income)
                                <?php $sum_tot_Price = 0 ?>
                                @foreach ($income as $user)
                                <tr>
                                    <td> {{ $user->created_at }} </td>
                                    {{-- <td> {{ $user->created_at->format('Y/m/d') }} </td> --}}
                                    <td> {{ $user->amount }} </td>
                                    <td> {!! $user->remark !!} </td>
                                    <td> {{ $user->name }} </td>
                                    <td> {{ $user->paymentmtd }} </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('income.edit', $user->id) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Edit">
                                                <i class="fa fa-edit" style="color: white"></i>
                                            </a>
                                            <a href="{{ route('income.delet', $user->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                <i class="fa fa-times" style="color: white"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $sum_tot_Price += $user->amount ?>
                                @endforeach
                                @endisset
                                <tr>
                                    <td style="font-weight: 900;color: red;">Total: {{ $sum_tot_Price}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
