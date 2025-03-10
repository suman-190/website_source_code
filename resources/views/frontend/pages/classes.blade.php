@extends('frontend.layouts.master')
@section('main_content')

    <div class="hero hero-detail hero-sub hero-career text-center">
        <div class="bg">
            <img src="/ui/images/hero-section.jpg" alt="Online Admission">
        </div>
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Upcoming Classes
                    </li>
                </ol>
            </nav>
            <div class="hero-detail-text">
                <h2>Find Our Upcoming Class Schedule Here!</h2>
                <div class="section-wrapper hero-cta hero-cta-big">
                    <p>
                        In order to make our candidates feel at ease, we have listed our upcoming class schedule
                        here!
                    </p>
                </div>
                <div class="btn-holder">
                    <a href="javascript:;" class="btn text-white"
                       id="arrow__down">
                        View All
                        <i class="fa fa-arrow-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-wrapper testimonial-wrapper scroll__down">
        <div style="min-height:84px">
            <div class="header-group filter-header">
                <div class="container">
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="input-group input-left ">
                                <span class="oldCourseCount" style="margin-right: 5px;">1 </span>
                                <span class="courseCount" style="margin-right: 5px;"></span>
                                <span class="courseCountText">Upcoming Classes</span>
                            </div>
                        </div>
                        <div class="d-flex search-box">
                            <input class="form-control me-2" id="search_course" type="search" value
                                   placeholder="Enter Course Name here" aria-label="Search">
                            <button class="btn" id="search_course_btn" type="submit"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="course-section">
                <div class="row old_data">
                    <div class="col course-list-col col-md-4 col-lg-3 mb-5">
                        <div class="card course-card course-card-v3 course-card-v2 upcomming-course-card">
                            <img class="card-img-top img-responsive lazy"
                                 src="/ui/images/course.jpg"
                                 alt="JAVA Training Package"
                                 title="Core Java, Advance Java &amp; Java Framework Training." style="">
                            <div class="card-body">
                                <strong class="card-title card__title_font_size">
                                    <a href="">Java
                                        Training Package</a>
                                </strong>
                                <p class="card-text">Duration: <strong>3 Months</strong></p>
                                <div class="time-wrapper">
                                    <a href="javascript:;" class="time-opener"><i class="fas fa-ellipsis-v"></i></a>
                                    <div class="time-content">
                                        <div class="time-slot">
                                            <span class="date"><i class="icon-calendar"></i> 17 Oct 2024</span>
                                            <span class="time"><i class="icon-time"></i> 06:30 AM - 08:00 AM</span>
                                        </div>
                                        <div class="time-slot">
                                            <span class="date"><i class="icon-calendar"></i> 22 Oct 2024</span>
                                            <span class="time"><i class="icon-time"></i> 06:30 AM - 08:00 AM</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="hovered" href="">
                                    <span class="btn btn-trans-primary"> Learn More <i
                                            class="fas fa-arrow-right"></i></span>
                            </a>
                        </div>
                        <div class="upcomming-course-btns">
                            <div class="btn-holder show-desktop text__upperCase book-btn">
                                <a href=""
                                   class="btn default-btn">Send Enquiry <i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                            <div class="btn-holder show-desktop text__upperCase join-btn ">
                                <a href="{{ route('pages.online-admission') }}" class="btn default-btn text-warning">Get admission <i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="load-more text-center load-more-testimonial">
                        <a href="javascript:void(0)" class="btn btn-primary btn-load-more" data-query=""
                           data-offset="32" id="load-more">
                            <span id="text">Load More <i class="fa fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


