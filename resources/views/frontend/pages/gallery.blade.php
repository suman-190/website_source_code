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
                        Success Gallery
                    </li>
                </ol>
            </nav>
            <div class="hero-detail-text">
                <h2>View Our Successful Students Here!</h2>
                <div class="section-wrapper hero-cta hero-cta-big">
                    <p>
                        Here, we present our successful students. They have found a suitable career in the competitive
                        professional IT world, in both national as well as international markets.
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
                        <div class="input-group input-left" style="display: none;">
                            <span class="oldCourseCount" style="margin-right: 5px;">32</span>
                            <span class="courseCount" style="display:none; margin-right: 5px;"></span>
                            <span class="courseCountText">Out of <span>1209</span> Students</span>
                        </div>
                        <div class="d-flex search-box">
                            <input class="form-control me-2" id="search_course" type="search" value
                                   placeholder="Enter Course Name here" aria-label="Search">
                            <button class="btn btn-link" id="search_course_btn" type="submit"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class>
                <div class="row loadmore old_data">
                    <div class="col-sm-3 col">
                        <div class="card success-card">
                            <div class="img">
                                <img class="lazy" src="/ui/images/rojina.jpg"
                                     alt="Successful student from Broadway Infosys Mr. ⁨Pragyan Khadka"
                                     title="Successful student from Broadway Infosys Mr. ⁨Pragyan Khadka">
                                <ul class="social-networks">
                                </ul>
                            </div>
                            <div class="text">
                                <div class="meta">
                                    <span>Working at:</span>
                                    <p class="company">Analytica</p>
                                </div>
                                <h3 class="name">Mr. ⁨Pragyan Khadka</h3>
                                <p class="course-name course-success-stories">Video Editor</p>
                                <div class="custom-tooltip" data-title="Everest Engineering College">
                                    <p class="custom--fixed--height st-college"><span>College: </span>Everest
                                        Engineering College</p>
                                </div>
                                <div class="custom-tooltip" data-title="Management">
                                    <p class="custom--fixed--height st-faculty"><span>Faculty: </span>Management</p>
                                </div>
                                <span class="date">04 Oct, 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
