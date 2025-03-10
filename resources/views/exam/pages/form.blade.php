@extends('exam.layouts.master')
@section('title', 'Fill Student Form')
@section('main-content')

    <div class="container-fluid  dashboard-content">

        <div class="row">
            <div class="col-md-6 mx-auto col-12">
                <div class="card">
                    <h5 class="card-header text-center">Fill Form To Give Exams</h5>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    @if (Auth::user()->student)
                        <div class="jumbotron">
                            <h1 class="display-3">Request already submitted</h1>
                            <p class="lead">If your form was not accepted please <a class="btn btn-dark btn-sm"
                                    href="{{ route('contatus') }}" role="button">Contact Us</a>.
                            </p>
                            <p class="lead">
                                <a class="btn btn-info btn-sm" href="{{ route('homepage') }}" role="button">Back to
                                    home</a>
                            </p>
                        </div>
                    @else
                        <div class="card-body">
                            <form action="{{ route('exam.form.store') }}" id="" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="catname">Name</label>
                                    <input type="text" name="name" class="form-control" id="catname12"
                                        placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="address"> Address </label>
                                    <input type="text" name="address" placeholder="" autocomplete="off"
                                        class="form-control" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label for="email_address"> Email Address </label>
                                    <input type="email" name="email_address" placeholder="" autocomplete="off"
                                        class="form-control" placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number"> Phone Number </label>
                                    <input type="number" name="phone_number" placeholder="" autocomplete="off"
                                        class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 pl-0">
                                        <p class="text-center">
                                            <button type="submit" name="submit"
                                                class="btn btn-space btn-primary">Submit</button>
                                            <a href="{{ route('homepage') }}" class="btn btn-space btn-danger"> Return Home
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>


    </div>

@endsection
