@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex" style="background: white;">

                    @php
                        $setting = App\Models\Setting::where('status', 'active')->latest()->first()
                    @endphp
                    @isset($setting)
                        <a href="{{ url('/login') }}" class="mx-auto">
                            <img src="{{asset($setting->logo)}}" alt="{{asset($setting->logo)}}" style="height:50px">
                        </a>
                    @endisset
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('Subject Type') }}</label>

                            <div class="col-md-6">
                                <select id="user_type" class="form-control @error('user_type') is-invalid @enderror" name="user_type" required>
                                    <option value="" disabled selected>{{ __('Select User Type') }}</option>
                                    <option value="NEC">NEC</option>
                                    <option value="Loksewa">Loksewa</option>
                                </select>

                                @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="subject_id" class="col-md-4 col-form-label text-md-right">{{ __('Select Subject') }}</label>

                            <div class="col-md-6">
                                <select id="subject_id" class="form-control @error('subject_id') is-invalid @enderror" name="subject_id" required>
                                    <option value="" disabled selected>{{ __('Select Subject') }}</option>
                                </select>

                                @error('subject_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 d-flex">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <a class="btn btn-success ml-auto" href="{{ route('login') }}">{{ __('Login') }}</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const nebSubjects = [
        { id: 76, name: 'Civil Engineering (ACiE)' },
        { id: 77, name: 'Mechanical Engineering (AMeE)' },
        { id: 78, name: 'Electrical Engineering (AEIE)' },
        { id: 79, name: 'Electrical and Electronics Engineering (AEEE)' },
        { id: 80, name: 'Computer Engineering (ACtE)' },
        { id: 81, name: 'Electronics and Communication Engineering (AExE)' },
        { id: 82, name: 'Electronics, Communication and Information Engineering (AEiE)' },
        { id: 83, name: 'Information Technology Engineering (AItE)' },
        { id: 141, name: 'Architecture Engineering (AArc)' }
    ];

    const loksewaSubjects = [
        // { id: 267, name: 'NEA-Electrical Engineer Level 7 (Loksewa Preparation)' },
        // { id: 268, name: 'NEA-Electrical Supervisor Level 5 (Loksewa Preparation)' },
        { id: 269, name: 'NEA-Computer Engineer Level 7 (Loksewa Preparation)' },
        { id: 270, name: 'NEA-Civil Engineer Level 7 (Loksewa Preparation)' },
        { id: 271, name: 'Computer Engineer/Computer Officer (Loksewa Preparation)' },
        { id: 272, name: 'Computer Operator (Loksewa Preparation)' }
    ];

    document.getElementById('user_type').addEventListener('change', function () {
        const userType = this.value;
        const subjectSelect = document.getElementById('subject_id');
        subjectSelect.innerHTML = '<option value="" disabled selected>Select Subject</option>'; // Reset options

        let subjects = [];
        if (userType === 'NEC') {
            subjects = nebSubjects;
        } else if (userType === 'Loksewa') {
            subjects = loksewaSubjects;
        }

        subjects.forEach(subject => {
            const option = document.createElement('option');
            option.value = subject.id;
            option.textContent = subject.name;
            subjectSelect.appendChild(option);
        });
    });
</script>
@endsection