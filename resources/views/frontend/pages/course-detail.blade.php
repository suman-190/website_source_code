@extends('frontend.layouts.master')
@section('main_content')
<div class="hero hero-detail">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12 " style="display:flex; flex-wrap: wrap;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $course->name }}</li>
                    </ol>
                </nav>
                <div class="hero-detail-text my-auto">
                    <h1>{{ $course->name }}</h1>
                    <div class="sub-info mb-2">
                        <div class="text-duration"><i class="fa fa-clock"></i> <span>
                                {{ $course->totalyear }}</span>
                        </div>
                        @if($course->category)
                        <div class="text-duration"><i class="fa fa-paste"></i> <span>
                                {{ $course->category->name }}</span>
                        </div>
                        @endif

                    </div>
                    <div class="sub-info">
                        <div class="text-duration"><i class="fa fa-lightbulb"></i> <span>
                                {{ $course->training_mode ?? 'Both, On-site And Online' }}</span>
                        </div>

                    </div>
                    <div class="sub-info">
                        {!!$course->export ?? "
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled
                        " !!}
                    </div>
                    <div class="btn-holder">
                        @if($course->syllabus)
                        <a href="{{ asset($course->syllabus) }}" class="btn btn-icon btn-yellow" style="background: #dc362e !important"
                            style="background: darkred !important">Syllabus<i class="fas fa-arrow-right"></i></a>
                        @endif
                        <a href="{{ route('pages.send-enquiry') }}" class="btn btn-icon btn-yellow">
                            Old Questions</a>
                        <a href="{{ route('pages.send-enquiry') }}" class="btn btn-icon btn-yellow" style="background-color:green !important">
                            Enroll Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div style="width: 100%; height: 100%; max-height: 400px; border-radius: 20px; overflow:hidden; display: flex;   align-content: center;
  justify-content: center;">
                    <img src="{{ asset($course->image) }}" style="width: 100%; object-fit: cover;" alt="">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="detail-container">
    <div class="container">
        <div class="tab-content py-3" id="myTabContent">
            <div class="tab-pane fade show active" id="course-info" role="tabpanel" aria-labelledby="course-info-tab">
                <div class="row">
                    <div class="col-12 col-md-12 pb-3">
                        <!-- <img src="{{ asset($course->image) }}" style="width: 100%" alt=""> -->
                        {!! $course->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection