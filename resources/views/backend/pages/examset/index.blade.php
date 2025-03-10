@extends('backend.layout.master')
@section('title', 'Exam Set')
@section('main-content')

<div class="container-fluid dashboard-content">

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 text-center p-2"> Exam sets </h5>
                    <a href="{{ route('admin.examset.create') }}" class="btn btn-primary btn-sm float-right"
                        data-toggle="tooltip" data-placement="bottom" title="Add Exam set"><i class="fas fa-plus"></i> Add
                        Set</a>
                </div>
                <div class="card-body">
                <form method="GET" action="{{ route('admin.examset.index') }}"class="pb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <select name="type" id="exam_type" class="form-control">
                                <option value="" disabled selected>Select Type</option>
                                <option value="NEC" {{ request('type') == 'NEC' ? 'selected' : '' }}>NEC</option>
                                <option value="Loksewa" {{ request('type') == 'Loksewa' ? 'selected' : '' }}>Loksewa</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="subject" id="subject_id" class="form-control">
                                <option value="" disabled selected>Select Subject</option>
                                <!-- Subjects will be populated dynamically based on type -->
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Name </th>
                                    <th> Subject </th>
                                    <th> View Questions </th>
                                    <th> Image </th>
                                    <th> Time Duration </th>
                                    <th> Status </th>
                                    <th>Action</th>
                                    <th>Attempts</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($examsets)
                                    @foreach ($examsets as $user)
                                        <tr>
                                            <td> {{ $user->id }} </td>
                                            <td> {{ $user->name }} </td>
                                            <td> {{ $user->subject? $user->subject->name : 'N/A' }} </td>
                                            <td>
                                                <div class="dropdown d-inline-block mb-1">
                                                    <a href="{{ route('admin.setsby.questions', $user->id) }}" class="btn btn-{{ $user->status == 'active' ? 'success' : 'danger' }} btn-sm"
                                                        type="button">
                                                        view
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="{{ asset($user->image) }}" class="img-fluid rounded-circle"
                                                    style="max-width:50px" alt="{{ $user->image }}">
                                            </td>
                                            <td>{{ $user->time_period }} Minutes</td>
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
                                                    <a href="{{ route('admin.examset.edit', $user->id) }}" type="button"
                                                        data-toggle="tooltip" title="Edit"
                                                        class="btn btn-link btn-primary">
                                                        <i class="fa fa-edit" style="color: white"></i>
                                                    </a>
                                                    <form action="{{ route('admin.examset.destroy', $user->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-link btn-danger" data-toggle="tooltip" title="Remove">
                                                            <i class="fa fa-times" style="color: white"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                Attempts: <span class="badge badge-primary">{{ $user->attempt()->count() }}</span>
                                                <br>
                                                <a class="btn btn-info btn-sm mt-2"
                                                    href="{{ route('admin.sets.review', $user->id) }}"
                                                    role="button">Review Old Exams</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section("scripts")
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
        { id: 269, name: 'NEA-Computer Engineer Level 7 (Loksewa Preparation)' },
        { id: 270, name: 'NEA-Civil Engineer Level 7 (Loksewa Preparation)' },
        { id: 271, name: 'Computer Engineer/Computer Officer (Loksewa Preparation)' },
        { id: 272, name: 'Computer Operator (Loksewa Preparation)' }
    ];

    // Function to populate the subject select box based on the selected type
    function populateSubjects(userType) {
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
    }

    // Event listener for type selection
    document.getElementById('exam_type').addEventListener('change', function () {
        const userType = this.value;
        populateSubjects(userType);
    });

    // Pre-populate subjects based on the current selected type (if any)
    document.addEventListener('DOMContentLoaded', function() {
        const selectedType = document.getElementById('exam_type').value;
        if (selectedType) {
            populateSubjects(selectedType);
        }
    });
</script>
@endsection