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
                        Testimonials
                    </li>
                </ol>
            </nav>
            <div class="hero-detail-text">
                <h2>See What Our Students Say</h2>
                <div class="section-wrapper hero-cta hero-cta-big">
                    <p>
                        All of our students have had something to say after their courses were completed! Students also
                        provide feedback which is duly appreciated!
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
                        <div class="input-group input-left">
                            <select class="form-select" id="select-course" aria-label="Default select example">
                                <option value>Choose Course</option>
                                <option value="digital-marketing-360-course">Digital Marketing 360° Training</option>
                                <option value="mern-stack-development-training-in-nepal">MERN Stack Development
                                    Training
                                </option>
                                <option value="web-designing-training-in-nepal">Web Design Training</option>
                                <option value="certified-information-systems-auditor-cisa-training-in-nepal">CISA
                                    Training
                                </option>
                                <option value="it-course-training-in-usa">IT Course Training in USA</option>
                            </select>
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
            <div class="row full-list old_data">
                <div class="col-sm-3 col">
                    <div class="card success-card h-100">
                        <div class="img testimonial-img">
                            <a href="">
                                <img src="/ui/images/girl.jpg"
                                     class="lazy" title="Testimonial From Ms. Prabisha Bajracharya"
                                     alt="Testimonial From Ms. Prabisha Bajracharya">
                            </a>
                            <ul class="social-networks">
                            </ul>
                        </div>
                        <div class="text h-100 pb-testimonial">
                            <h3 class="name">Ms.
                                Prabisha Bajracharya</h3>
                            <p class="course-name">
                                <a class="tag-sm"
                                   href="/quality-assurance-training-in-nepal">
                                    QA Training
                                </a>
                            </p>
                            <span class="date">09 Oct, 2024 </span>
                            <div class="para-testimonial">
                                <p class="content hidden-text" data-bs-toggle="tooltip" data-bs-placement="top"
                                   title="I recently completed a 2.5-month QA course at Broadway Infosys, and I feel great about the experience. The course provided me with practical skills and a solid understanding of quality assurance processes. The instructors were knowledgeable and supportive, and the hands-on approach really helped me grasp key concepts. Overall, it was a positive and enriching experience that has prepared me well for a career in QA.">
                                    I recently completed a 2.5-month QA course at Broadway Infosys, and I feel great
                                    about the experience. The course provided me with practical skills and a solid
                                    understanding of quality assurance processes. The instructor <a
                                        href="">more…</a>
                                </p>
                            </div>
                            <div class="viw-more-btn">
                                <a href="{{ route('pages.testimonial.detail') }}"> View
                                    more <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
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
@endsection
