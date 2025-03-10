@extends('backend.layout.master')
@section('title', 'Add User')
@section('main-content')

<div class="container-fluid  dashboard-content">

    <div class="row">
        <div class="col-md-6 mx-auto col-12">
            <div class="card">
                <h5 class="card-header">Add income</h5>
                @error('name')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $income }}</strong>
                </div>
                @enderror
                @error('email')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $income }}</strong>
                    </div>
                @enderror
                @error('phone')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $income }}</strong>
                    </div>
                @enderror
                @error('password')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $income }}</strong>
                </div>
                @enderror
                @error('role')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $income }}</strong>
                </div>
                @enderror
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('status') }}</strong>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('income.update', $data['id']) }}" id="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="catname">Amount</label>
                            <input type="number" value="{{$data['amount']}}"  name="amount" class="form-control" id="catname12" value="PPSG" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="catname">Full name</label>
                            <input type="text" name="name" readonly value="{{$data['name']}}" class="form-control" id="catname12">
                        </div>
                        <div class="form-group">
                            <label for="catname">Remark</label>
                            <input type="text" name="remark" value="{{$data['remark']}}"  value="" class="form-control" id="catname12" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="paymentmtd">Select Payment Method</label>
                            <select class="form-control" name="paymentmtd">
                                <option value="Cash">Cash</option>
                                <option value="Online">Online</option>
                                <option value="Cheque">Cheque</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subcategorysubcategory"> Select Student </label>
                            <select name="client_id" id="client_id" class="form-control">
                                <option value="">---select---</option>
                                @foreach ($client_id as $category)
                                    <option value="{{ $category->id }}">{{ $category->customer_id }} - {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 pl-0">
                                <p class="text-center">
                                    <button type="submit" name="submit" class="btn btn-space btn-primary">Add</button>
                                    <a href="{{ url('/admin/income') }}" class="btn btn-space btn-danger"> Back </a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
