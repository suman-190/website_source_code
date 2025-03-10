@extends('frontend.layouts.master')
@section('styles')
    <style>
        .sn-top-des{
            color: white;
            padding-left: 15px;
        }
    </style>
@endsection
@section('main_content')
    <div class="hero hero-detail">
        <div class="bg"><img src="/ui/images/hero-section.jpg" alt="Course background"></div>
        <div class="container">
            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $cat->name }}</li>
                </ol>
            </nav> --}}
            <div class="sn-top-des">
                <h1>Search for: {{ $keyword }}</h1>
            </div>
        </div>
    </div>
    <div class="detail-container">
        <div class="container">
            <div class="tab-content py-3" id="myTabContent">
                <div class="tab-pane fade show active" id="course-info" role="tabpanel"
                     aria-labelledby="course-info-tab">
                    <div class="row">
                        <div class="col col-md-8 pb-3">
                            <div class="row">
                                @foreach ($courses as $course)
                                <div class="item course-list-col col-md-4 col-lg-3">
                                    <div class="card course-card ">
                                        <img src="{{ asset($course->image) }}" class="card-img-top img-responsive lazy"
                                            alt="Digital Marketing 360�� Training" title="Digital Marketing 360�� Training" style="">
                                        <div class="card-body">
                                            <strong class="card-title card__title_font_size">
                                                <a href="{{ route('pages.course-detail',$course->slag) }}">{{ $course->name }}</a>
                                            </strong>
                                            <p class="card-text">Duration: <strong>{{ $course->totalyear }}</strong></p>
                                        </div>
                                        <a href="{{ route('pages.course-detail',$course->slag) }}" class="hovered">
                                            <span class="btn btn-trans-primary text-white">Learn More <i
                                                    class="icon-arrow-chevrolet"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="contact-box">
                                <h2>Quick Inquiry</h2>
                                <form method="POST" action="{{ route('front.feedback.store') }}"
                                  accept-charset="UTF-8" class="base-form form-vertical form-liner" id="contact-form"
                                  name="contact-form">
                                  @csrf
                                  @if(session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                  @endif
                                <div class="form-pos">
                                    <div class="input-group">
                                        <label for="name" class="form-label">Name <span class="ast">*</span></label>
                                        <input class="form-control" name="name" placeholder="Your Name" tabindex="1"
                                               type="text">
                                    </div>
                                    <div class="input-group">
                                        <label class="control-label">
                                            Email <span class="required">*</span>
                                        </label>
                                        <input class="form-control" placeholder="Your Email" tabindex="2"
                                               onkeyup=""
                                               pattern="([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)" required=""
                                               name="email" type="email">
                                    </div>
                                    <div class="input-group">
                                        <label class="control-label">
                                            Mobile Number <span class="required">*</span>
                                        </label>
                                            <input class="form-control" id="mobile" tabindex="3"
                                                   name="contact" type="tel" autocomplete="off"
                                                   placeholder="e.g. 9841002000">
                                    </div>
                                    <div class="input-group">
                                        <label for="message" class="form-label">Message <span
                                                class="ast">*</span></label>
                                        <textarea class="form-control" required="" placeholder="You Message"
                                                  tabindex="6" name="message" cols="50" rows="10"></textarea>
                                    </div>
                                    <div class="btn-holder">
                                        <button type="submit" tabindex="7" id="contact-submit-btn"
                                                class="btn btn-icon btn-primary">Submit enquiry
                                            <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
