@extends('frontend.layouts.master')
@section('main_content')
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
                            Blogs
                        </li>
                    </ol>
                </nav>
                <div class="hero-detail-text">
                    <h2>Find Our Blogs!</h2>
                    <div class="section-wrapper hero-cta hero-cta-big">
                        <p>
                            In order to make our candidates feel at ease, we have listed our blogs
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
            <div class="container">
                <div class="course-section">
                    <div class="row old_data">
                        <div class="col course-list-col col-md-4 col-lg-3 mb-5">
                            <div class="card course-card my-0">
                                <img class="card-img-top img-responsive lazy"
                                     src="/ui/images/course.jpg"
                                     alt="JAVA Training Package"
                                     title="Core Java, Advance Java &amp; Java Framework Training." style="">
                                <div class="card-body">
                                    <strong class="card-title card__title_font_size">
                                        <a href="">Java
                                            Training Package</a>
                                    </strong>
                                </div>
                                <div class="text h-100 pb-testimonial">
                                    <span class="date">09 Oct, 2024 </span>
                                    <div class="para-testimonial">
                                        <p class="content hidden-text" data-bs-toggle="tooltip" data-bs-placement="top"
                                           title="I recently completed a 2.5-month QA course at Broadway Infosys, and I feel great about the experience. The course provided me with practical skills and a solid understanding of quality assurance processes. The instructors were knowledgeable and supportive, and the hands-on approach really helped me grasp key concepts. Overall, it was a positive and enriching experience that has prepared me well for a career in QA.">
                                            I recently completed a 2.5-month QA course at Broadway Infosys, and I feel
                                            great
                                            about the experience. The course provided me with practical skills and a
                                            solid
                                            understanding of quality assurance processes. The instructor <a
                                                href="">more…</a>
                                        </p>
                                    </div>
                                    <div class="blog-more">
                                        <a href="{{ route('pages.blog-detail') }}"> Learn
                                            more <i class="fa fa-arrow-right"></i></a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    @endsection




