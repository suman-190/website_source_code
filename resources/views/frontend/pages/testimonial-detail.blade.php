@extends('frontend.layouts.master')
@section('main_content')
    <div class="hero hero-detail hero-sub hero-career text-center">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/">Student Testimonials</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Detail
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="section-wrapper detail-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 card media-card detail">
                    <div class="header-group">
                        <h3 class="name">Mr. Suyog Bhattarai</h3>
                        <a class="tag-sm" href="">Web Design
                            Training</a>
                        <span class="date"> 8 August, 2024 </span>
                    </div>
                    <div class="card card-v2">
                        <div class="left-pos">
                            <div class="img img-full img-testimonial">
                                <img src="/ui/images/girl.jpg"
                                     class="lazy testimonial-avatar" title="Testimonial From Mr. Suyog Bhattarai"
                                     alt="title=">
                            </div>
                        </div>
                        <div class="text">
                            <div class="icon-testimonial"><i class="fas fa-quote-left"></i></div>
                            <p>Broadway Infosys provides seamless quality and infrastructure for students to grasp the
                                skill that they want to learn. Multiple options and flexible timings to study are the
                                ones that I like the most. Lastly, thanks to my instructor&nbsp;for such an amazing
                                class on web development.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div>
    </div>
@endsection
