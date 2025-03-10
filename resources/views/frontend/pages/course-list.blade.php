@extends('frontend.layouts.master')

@section('styles')
<style>
.hero.hero-detail {
    height: 100%;
    min-height: 100px;
}

.sn-top-des {
    color: white;
    padding-left: 15px;
}

.course-type-btn {
    margin: 5px;
}

.hidden {
    display: none;
}

.btn-group .btn {
    padding: 7px 10px !important;
}
</style>
@endsection

@section('main_content')
<!-- <div class="hero hero-detail">
        <div class="container">
            <div class="sn-top-des">
                <h1>{{ $cat->name }}</h1>
            </div>
        </div>
    </div> -->

<div class="detail-container">
    <div class="container">
        @php
        $groupedCourses = $courses->groupBy('type'); // Assuming `type` is a field in your courses table
        @endphp
        @if(count($groupedCourses) > 1)

        <div class="course-types">
            <div class="btn-group" role="group" aria-label="Course Types">
                <!-- Show All Button -->
                <button type="button" class="btn btn-secondary course-type-btn"
                    onclick="toggleCourses('all')">All</button>

                <!-- Course Type Buttons -->
                @foreach ($groupedCourses as $type => $coursesByType)
                <button type="button" class="btn btn-primary course-type-btn" data-type="{{ Str::slug($type) }}"
                    onclick="toggleCourses('{{ Str::slug($type) }}')">
                    {{ $type == null ? "Other" : ucfirst($type) }}
                </button>
                @endforeach
            </div>
        </div>
        @endif

        <div class="tab-content py-3" id="myTabContent">
            <div class="tab-pane fade show active" id="course-info" role="tabpanel" aria-labelledby="course-info-tab">
                <div class="row">
                    @foreach ($courses as $course)
                    <div class="item course-list-col col-md-4 col-lg-3 course-type-{{ Str::slug($course->type) }}">
                        <div class="card course-card">
                            <img src="{{ asset($course->image) }}" class="card-img-top img-responsive lazy"
                                alt="{{ $course->name }}" title="{{ $course->name }}">
                            <div class="card-body" style="padding-bottom: 0">
                                <strong class="card-title" style="margin-bottom: 0;">
                                    <a href="{{ route('pages.course-detail', $course->slag) }}">{{ $course->name }}</a>
                                </strong>
                            </div>
                            <a href="{{ route('pages.course-detail', $course->slag) }}" class="hovered">
                                <span class="btn btn-trans-primary text-white">{{ $course->name }} <i
                                        class="icon-arrow-chevrolet"></i></span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Initially show all courses
    $('.course-list-col').removeClass('hidden');
});

// Inline JavaScript function for toggling visibility of courses
window.toggleCourses = function(type) {
    if (type === 'all') {
        // Show all courses if 'Show All' is clicked
        $('.course-list-col').removeClass('hidden');
    } else {
        // Hide all courses
        $('.course-list-col').addClass('hidden');

        // Show only the courses of the selected type
        $('.course-type-' + type).removeClass('hidden');
    }

    // Optionally, toggle the active class on the button (if needed)
    var button = $('button[data-type="' + type + '"]');
    button.toggleClass('active');
}
</script>
@endsection