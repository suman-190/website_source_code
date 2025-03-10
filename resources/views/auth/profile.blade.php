@extends('frontend.layouts.master')
@section('title', 'Profile')
@section('main_content')


<div class="container dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title"> Profile</h2>
            </div>
        </div>
    </div>
    <div class="bg-light">
        <div class="row">
            @auth
                <div class="col-12">
                    <section>
                        <div class="container">
                            <div class="row">
                                {{-- {{ dd(Auth::user()) }} --}}
                                <!-- Profile Section -->
                                <div class="col-md-4 col-12 text-center">
                                    <div class="card mt-3 p-3 text-light" style="background: #159bc8;">
                                        <h4>Profile</h4>
                                        <div class="d-flex justify-content-center mb-3">
                                            <!-- Profile Image -->
                                            <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : 'https://via.placeholder.com/150' }}"
                                                class="img-fluid rounded-circle"
                                                alt="Profile Image"
                                                style="width: 150px; height: 150px; object-fit: cover;background: white;">
                                        </div>
                                        <h5>{{ Auth::user()->name }}</h5>
                                        <p>{{ Auth::user()->email }}</p>
                                    </div>
                                </div>

                                <!-- Profile Update Form -->
                                <div class="col-md-8 col-12">
                                    <div class="card mt-3 p-3 text-light" style="background: #159bc8;">
                                        <h2>Profile Update</h2>

                                        <!-- Success Message -->
                                        @if(session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <!-- Error Messages -->
                                        @if($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <!-- Profile Update Form -->
                                        <form action="{{ route('exam.profile.update') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')

                                            <!-- Name Field -->
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ old('name', Auth::user()->name) }}" required>
                                            </div>

                                            <!-- Image Upload -->
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Profile Image</label>
                                                <input type="file" name="image" id="image" class="form-control">
                                            </div>

                                            <!-- Password Fields -->
                                            <div class="mb-3">
                                                <label for="current_password" class="form-label">Current Password</label>
                                                <input type="password" name="current_password" id="current_password" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="new_password" class="form-label">New Password</label>
                                                <input type="password" name="new_password" id="new_password" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- JS for Form Validation -->
                        <script>
                            document.querySelector('form').addEventListener('submit', function (event) {
                                let currentPassword = document.querySelector('#current_password').value;
                                let newPassword = document.querySelector('#new_password').value;
                                let confirmPassword = document.querySelector('#new_password_confirmation').value;

                                // If password fields are filled, ensure current password is provided
                                if (!currentPassword && (newPassword || confirmPassword)) {
                                    event.preventDefault();
                                    alert('Please provide your current password to change your password.');
                                } else if (newPassword !== confirmPassword) {
                                    event.preventDefault();
                                    alert('New password and confirm password do not match.');
                                }
                            });
                        </script>
                    </section>
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection
