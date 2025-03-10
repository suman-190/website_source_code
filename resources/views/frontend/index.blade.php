@extends('frontend.layouts.master')
@section('main_content')
<style>
.testimonial-wrapper .half-panel{
    padding: 0!important;
}
@media (min-width: 992px) {
  .testimonial-wrapper .box {
      margin: 0 !important;
  }
}
.card .card-img-top,
.card .lazy,
.card .hovered {
    max-height: 220px;
}

.sncard-img {
    overflow: hidden;
}

.sncard-img img {
    transition: all 1s fade out;
}

.card:hover>.sncard-img>img {
    transform: scale(1.1);
}


.card.course-card .card-title {
    margin-bottom: 0;
}

.card.course-card .card-body {
    padding-bottom: 0;
}
.section-wrapper .section-header .header-title h4{
    font-size: 24px !important;
}
  @media (max-width: 992px) {
        .item.course-list-col {
            flex-basis: calc(50% - 12px) !important;
            max-width: calc(50% - 12px) !important;
        }
    }
    
    @media (max-width: 576px) {
        .item.course-list-col {
            flex-basis: 100% !important;
            max-width: 100% !important;
        }
    }
</style>
<!-- Hero section -->
<section id="homepage">
    <div class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 p-0">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($banners as $key => $banner)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <a href="#" target="_blank">
                                    <img src="{{ asset($banner->image) }}" class="d-block w-100"
                                        alt="Dashain 2081 Offer Web Banner" title="Dashain 2081 Offer Web Banner">
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <!-- Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<!--course section -->
<section class="section-wrapper course-section pb-70 pt-70">
    <div class="container p-0">
        <header class="section-header">
            <div class="header-title">
                <h4>B.E Coaching Classes</h4>
            </div>
        </header>
        <div class="tab-content section-content">
            <div aria-labelledby="becoaching-tab" id="becoaching" class="tab-pane fade show active" role="tabpanel">
                <div style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: center;">
                    
                    <div class="item course-list-col" style="flex-basis: calc(25% - 12px); max-width: calc(25% - 12px); min-width: 200px;">
                        <div class="card course-card" style="width: 100%;">
                            <div class="sncard-img">
                                <img src="{{ asset('content/upload/category/imagelhu2cmzhr.png') }}" 
                                    class="card-img-top img-responsive lazy" alt="I.O.E" title="I.O.E">
                            </div>
                            <div class="card-body">
                                <strong class="card-title card__title_font_size">
                                    <a href="{{ route('pages.course-list', 'ioe') }}">I.O.E, Tribhuvan University</a>
                                </strong>
                            </div>
                            <a href="{{ route('pages.course-list', 'ioe') }}" class="hovered">
                                <span class="btn btn-trans-primary text-white">I.O.E, Tribhuvan University <i class="icon-arrow-chevrolet"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="item course-list-col" style="flex-basis: calc(25% - 12px); max-width: calc(25% - 12px); min-width: 200px;">
                        <div class="card course-card" style="width: 100%;">
                            <div class="sncard-img">
                                <img src="{{ asset('content/upload/category/imagedcd9namyc.png') }}" 
                                    class="card-img-top img-responsive lazy" alt="Pokhara University" title="Pokhara University">
                            </div>
                            <div class="card-body">
                                <strong class="card-title card__title_font_size">
                                    <a href="{{ route('pages.course-list', 'pokhara-university') }}">Pokhara University</a>
                                </strong>
                            </div>
                            <a href="{{ route('pages.course-list', 'pokhara-university') }}" class="hovered">
                                <span class="btn btn-trans-primary text-white">Pokhara University <i class="icon-arrow-chevrolet"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="item course-list-col" style="flex-basis: calc(25% - 12px); max-width: calc(25% - 12px); min-width: 200px;">
                        <div class="card course-card" style="width: 100%;">
                            <div class="sncard-img">
                                <img src="{{ asset('content/upload/category/imagetq96huc0a.png') }}" 
                                    class="card-img-top img-responsive lazy" alt="Purbanchal University" title="Purbanchal University">
                            </div>
                            <div class="card-body">
                                <strong class="card-title card__title_font_size">
                                    <a href="{{ route('pages.course-list', 'purwanchal-university') }}">Purbanchal University</a>
                                </strong>
                            </div>
                            <a href="{{ route('pages.course-list', 'purwanchal-university') }}" class="hovered">
                                <span class="btn btn-trans-primary text-white">Purbanchal University <i class="icon-arrow-chevrolet"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="item course-list-col" style="flex-basis: calc(25% - 12px); max-width: calc(25% - 12px); min-width: 200px;">
                        <div class="card course-card" style="width: 100%;">
                            <div class="sncard-img">
                                <img src="{{ asset('content/upload/category/imagenwwh6bipg.png') }}" 
                                    class="card-img-top img-responsive lazy" alt="Others University" title="Others University">
                            </div>
                            <div class="card-body">
                                <strong class="card-title card__title_font_size">
                                    <a href="{{ route('pages.course-list', 'others') }}">Others University</a>
                                </strong>
                            </div>
                            <a href="{{ route('pages.course-list', 'others') }}" class="hovered">
                                <span class="btn btn-trans-primary text-white">Others University <i class="icon-arrow-chevrolet"></i></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-wrapper course-section pb-70 pt-70">
    <div class="container p-0" style="overflow-x: hidden;">
        <header class="section-header">
            <div class="header-title">
                <h4>NEC License Preparation Classes</h4>
            </div>
        </header>
        <div class="tab-content section-content">
            <div aria-labelledby="neclicense-tab" id="neclicense" class="tab-pane fade show active" role="tabpanel">
                <div style="gap: 15px; justify-content: center;">
                    <div class=" reco-course-carousel" style="position: relative;">
                        @foreach ($necLicense as $category)
                        <div class="">
                            <div class="card course-card">
                                <div class="sncard-img">
                                    <img src="{{ asset($category->image) }}" class="card-img-top img-responsive lazy"
                                        alt="{{ $category->name }}" title="{{ $category->name }}">
                                </div>
                                <div class="card-body">
                                    <strong class="card-title card__title_font_size">
                                        <a
                                            href="{{ route('pages.course-detail',$category->slag) }}">{{ $category->name }}</a>
                                    </strong>
                                </div>
                                <a href="{{ route('pages.course-detail',$category->slag) }}" class="hovered">
                                    <span class="btn btn-trans-primary text-white">{{ $category->name }} <i
                                            class="icon-arrow-chevrolet"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--<div class="row">-->
                <!--    <div class="item course-list-col col-md-4 col-lg-3">-->
                <!--        <div class="card course-card">-->
                <!--            <img src="{{ asset('content/upload/category/imagezosodlcec.png') }}" class="card-img-top img-responsive lazy"-->
                <!--                alt="Civil Engineering (ACiE)" title="Civil Engineering (ACiE)">-->
                <!--            <div class="card-body">-->
                <!--                <hr>-->
                <!--                <strong class="card-title card__title_font_size">-->
                <!--                    <a href="{{ route('pages.course-list', 'civil-engineering-acie') }}">Civil Engineering (ACiE)</a>-->
                <!--                </strong>-->
                <!--                <p class="card-text">NEC License Preparation Classes</p>-->
                <!--            </div>-->
                <!--            <a href="{{ route('pages.course-list', 'civil-engineering-acie') }}" class="hovered">-->
                <!--                <span class="btn btn-trans-primary text-white">Civil Engineering (ACiE) <i class="icon-arrow-chevrolet"></i></span>-->
                <!--            </a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="item course-list-col col-md-4 col-lg-3">-->
                <!--        <div class="card course-card">-->
                <!--            <img src="{{ asset('content/upload/category/imagepzrarrlel.png') }}" class="card-img-top img-responsive lazy"-->
                <!--                alt="Mechanical Engineering (AMeE)" title="Mechanical Engineering (AMeE)">-->
                <!--            <div class="card-body">-->
                <!--                <hr>-->
                <!--                <strong class="card-title card__title_font_size">-->
                <!--                    <a href="{{ route('pages.course-list', 'mechanical-engineering-amee') }}">Mechanical Engineering (AMeE)</a>-->
                <!--                </strong>-->
                <!--                <p class="card-text">NEC License Preparation Classes</p>-->
                <!--            </div>-->
                <!--            <a href="{{ route('pages.course-list', 'mechanical-engineering-amee') }}" class="hovered">-->
                <!--                <span class="btn btn-trans-primary text-white">Mechanical Engineering (AMeE) <i class="icon-arrow-chevrolet"></i></span>-->
                <!--            </a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="item course-list-col col-md-4 col-lg-3">-->
                <!--        <div class="card course-card">-->
                <!--            <img src="{{ asset('content/upload/category/image04bbnslac.png') }}" class="card-img-top img-responsive lazy"-->
                <!--                alt="Electrical Engineering (AEIE)" title="Electrical Engineering (AEIE)">-->
                <!--            <div class="card-body">-->
                <!--                <hr>-->
                <!--                <strong class="card-title card__title_font_size">-->
                <!--                    <a href="{{ route('pages.course-list', 'electrical-engineering-aeie') }}">Electrical Engineering (AEIE)</a>-->
                <!--                </strong>-->
                <!--                <p class="card-text">NEC License Preparation Classes</p>-->
                <!--            </div>-->
                <!--            <a href="{{ route('pages.course-list', 'electrical-engineering-aeie') }}" class="hovered">-->
                <!--                <span class="btn btn-trans-primary text-white">Electrical Engineering (AEIE) <i class="icon-arrow-chevrolet"></i></span>-->
                <!--            </a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="item course-list-col col-md-4 col-lg-3">-->
                <!--        <div class="card course-card">-->
                <!--            <img src="{{ asset('content/upload/category/imagem1wbclhxt.png') }}" class="card-img-top img-responsive lazy"-->
                <!--                alt="Electrical and Electronics Engineering (AEEE)" title="Electrical and Electronics Engineering (AEEE)">-->
                <!--            <div class="card-body">-->
                <!--                <hr>-->
                <!--                <strong class="card-title card__title_font_size">-->
                <!--                    <a href="{{ route('pages.course-list', 'electrical-and-electronics-engineering-aeee') }}">Electrical and Electronics Engineering (AEEE)</a>-->
                <!--                </strong>-->
                <!--                <p class="card-text">NEC License Preparation Classes</p>-->
                <!--            </div>-->
                <!--            <a href="{{ route('pages.course-list', 'electrical-and-electronics-engineering-aeee') }}" class="hovered">-->
                <!--                <span class="btn btn-trans-primary text-white">Electrical and Electronics Engineering (AEEE) <i class="icon-arrow-chevrolet"></i></span>-->
                <!--            </a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="item course-list-col col-md-4 col-lg-3">-->
                <!--        <div class="card course-card">-->
                <!--            <img src="{{ asset('content/upload/category/image6hxkfcgtf.png') }}" class="card-img-top img-responsive lazy"-->
                <!--                alt="Computer Engineering (ACtE)" title="Computer Engineering (ACtE)">-->
                <!--            <div class="card-body">-->
                <!--                <hr>-->
                <!--                <strong class="card-title card__title_font_size">-->
                <!--                    <a href="{{ route('pages.course-list', 'computer-engineering-acte') }}">Computer Engineering (ACtE)</a>-->
                <!--                </strong>-->
                <!--                <p class="card-text">NEC License Preparation Classes</p>-->
                <!--            </div>-->
                <!--            <a href="{{ route('pages.course-list', 'computer-engineering-acte') }}" class="hovered">-->
                <!--                <span class="btn btn-trans-primary text-white">Computer Engineering (ACtE) <i class="icon-arrow-chevrolet"></i></span>-->
                <!--            </a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="item course-list-col col-md-4 col-lg-3">-->
                <!--        <div class="card course-card">-->
                <!--            <img src="{{ asset('content/upload/category/imageldkqlgtqt.png') }}" class="card-img-top img-responsive lazy"-->
                <!--                alt="Electronics and Communication Engineering (AExE)" title="Electronics and Communication Engineering (AExE)">-->
                <!--            <div class="card-body">-->
                <!--                <hr>-->
                <!--                <strong class="card-title card__title_font_size">-->
                <!--                    <a href="{{ route('pages.course-list', 'electronics-and-communication-engineering-aexe') }}">Electronics and Communication Engineering (AExE)</a>-->
                <!--                </strong>-->
                <!--                <p class="card-text">NEC License Preparation Classes</p>-->
                <!--            </div>-->
                <!--            <a href="{{ route('pages.course-list', 'electronics-and-communication-engineering-aexe') }}" class="hovered">-->
                <!--                <span class="btn btn-trans-primary text-white">Electronics and Communication Engineering (AExE) <i class="icon-arrow-chevrolet"></i></span>-->
                <!--            </a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="item course-list-col col-md-4 col-lg-3">-->
                <!--        <div class="card course-card">-->
                <!--            <img src="{{ asset('content/upload/category/imagerjjjjcnaj.png') }}" class="card-img-top img-responsive lazy"-->
                <!--                alt="Electronics, Communication and Information Engineering (AEiE)" title="Electronics, Communication and Information Engineering (AEiE)">-->
                <!--            <div class="card-body">-->
                <!--                <hr>-->
                <!--                <strong class="card-title card__title_font_size">-->
                <!--                    <a href="{{ route('pages.course-list', 'electronics-communication-and-information-engineeringaeie') }}">Electronics, Communication and Information Engineering (AEiE)</a>-->
                <!--                </strong>-->
                <!--                <p class="card-text">NEC License Preparation Classes</p>-->
                <!--            </div>-->
                <!--            <a href="{{ route('pages.course-list', 'electronics-communication-and-information-engineeringaeie') }}" class="hovered">-->
                <!--                <span class="btn btn-trans-primary text-white">Electronics, Communication and Information Engineering (AEiE) <i class="icon-arrow-chevrolet"></i></span>-->
                <!--            </a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="item course-list-col col-md-4 col-lg-3">-->
                <!--        <div class="card course-card">-->
                <!--            <img src="{{ asset('content/upload/category/image8x8huif6r.png') }}" class="card-img-top img-responsive lazy"-->
                <!--                alt="Information Technology Engineering (AItE)" title="Information Technology Engineering (AItE)">-->
                <!--            <div class="card-body">-->
                <!--                <hr>-->
                <!--                <strong class="card-title card__title_font_size">-->
                <!--                    <a href="{{ route('pages.course-list', 'information-technology-engineering-aite') }}">Information Technology Engineering (AItE)</a>-->
                <!--                </strong>-->
                <!--                <p class="card-text">NEC License Preparation Classes</p>-->
                <!--            </div>-->
                <!--            <a href="{{ route('pages.course-list', 'information-technology-engineering-aite') }}" class="hovered">-->
                <!--                <span class="btn btn-trans-primary text-white">Information Technology Engineering (AItE) <i class="icon-arrow-chevrolet"></i></span>-->
                <!--            </a>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

            </div>
        </div>
    </div>
</section>

<section class="section-wrapper course-section pb-70 pt-70">
    <div class="container p-0">
        <header class="section-header">
            <div class="header-title">
                <h4>Trainings</h4>
            </div>
        </header>
        <div class="tab-content section-content">
            <div aria-labelledby="trainings-tab" id="trainings" class="tab-pane fade show active" role="tabpanel">
                <div style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: center;">

                    <div class="item course-list-col" style="flex-basis: calc(25% - 12px); max-width: calc(25% - 12px); min-width: 200px;">
                        <div class="card course-card" style="width: 100%;">
                            <div class="sncard-img">
                                <img src="{{ asset('content/upload/category/imagepv17binko.jpeg') }}" 
                                    class="card-img-top img-responsive lazy" alt="IT Trainings" title="IT Trainings">
                            </div>
                            <div class="card-body">
                                <strong class="card-title card__title_font_size">
                                    <a href="{{ route('pages.course-list', 'it-trainings') }}">IT Trainings</a>
                                </strong>
                            </div>
                            <a href="{{ route('pages.course-list', 'it-trainings') }}" class="hovered">
                                <span class="btn btn-trans-primary text-white">IT Trainings <i class="icon-arrow-chevrolet"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="item course-list-col" style="flex-basis: calc(25% - 12px); max-width: calc(25% - 12px); min-width: 200px;">
                        <div class="card course-card" style="width: 100%;">
                            <div class="sncard-img">
                                <img src="{{ asset('content/upload/category/imagedmspzkz59.jpg') }}" 
                                    class="card-img-top img-responsive lazy" alt="Engineering Trainings" title="Engineering Trainings">
                            </div>
                            <div class="card-body">
                                <strong class="card-title card__title_font_size">
                                    <a href="{{ route('pages.course-list', 'engineering-trainings') }}">Engineering Trainings</a>
                                </strong>
                            </div>
                            <a href="{{ route('pages.course-list', 'engineering-trainings') }}" class="hovered">
                                <span class="btn btn-trans-primary text-white">Engineering Trainings <i class="icon-arrow-chevrolet"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="item course-list-col" style="flex-basis: calc(25% - 12px); max-width: calc(25% - 12px); min-width: 200px;">
                        <div class="card course-card" style="width: 100%;">
                            <div class="sncard-img">
                                <img src="{{ asset('content/upload/category/image0oujbqkhs.jpeg') }}" 
                                    class="card-img-top img-responsive lazy" alt="Professional Trainings" title="Professional Trainings">
                            </div>
                            <div class="card-body">
                                <strong class="card-title card__title_font_size">
                                    <a href="{{ route('pages.course-list', 'professional-trainings') }}">Professional Trainings</a>
                                </strong>
                            </div>
                            <a href="{{ route('pages.course-list', 'professional-trainings') }}" class="hovered">
                                <span class="btn btn-trans-primary text-white">Professional Trainings <i class="icon-arrow-chevrolet"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="item course-list-col" style="flex-basis: calc(25% - 12px); max-width: calc(25% - 12px); min-width: 200px;">
                        <div class="card course-card" style="width: 100%;">
                            <div class="sncard-img">
                                <img src="{{ asset('content/upload/category/image0oujbqkhs.jpeg') }}" 
                                    class="card-img-top img-responsive lazy" alt="Professional Trainings" title="Professional Trainings">
                            </div>
                            <div class="card-body">
                                <strong class="card-title card__title_font_size">
                                    <a href="{{ route('pages.course-list', 'professional-trainings') }}">Professional Trainings</a>
                                </strong>
                            </div>
                            <a href="{{ route('pages.course-list', 'professional-trainings') }}" class="hovered">
                                <span class="btn btn-trans-primary text-white">Professional Trainings <i class="icon-arrow-chevrolet"></i></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

{{-- 
<section class="section-wrapper course-section pb-70 pt-70">
    <div class="container">
        <header class="section-header">
            <div class="header-title">
                <h4>MSc Entrance Preparation</h4>
            </div>
        </header>
        <div class="tab-content section-content">
            <div aria-labelledby="mscentrance-tab" id="mscentrance" class="tab-pane fade show active" role="tabpanel">
                <!--<div class="row">-->
                <!--    @foreach ($mscEntrance as $category)-->
                <!--    <div class="item course-list-col col-md-4 col-lg-3">-->
                <!--        <div class="card course-card">-->
                <!--            <img src="{{ asset($category->image) }}" class="card-img-top img-responsive lazy"-->
<!--                alt="{{ $category->name }}" title="{{ $category->name }}">-->
<!--            <div class="card-body">-->
<!--                <strong class="card-title card__title_font_size">-->
<!--                    <a href="{{ route('pages.course-list', $category->slag) }}">{{ $category->name }}</a>-->
<!--                </strong>-->
<!--                <p class="card-text">Duration: <strong>{{ $category->duration }}</strong></p>-->
<!--            </div>-->
<!--            <a href="{{ route('pages.course-list', $category->slag) }}" class="hovered">-->
<!--                <span class="btn btn-trans-primary text-white">Learn More <i-->
<!--                        class="icon-arrow-chevrolet"></i>-->
<!--                </span>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--    @endforeach-->
<!--</div>-->
<div class="row">
    <div class="item course-list-col col-md-4 col-lg-4">
        <div class="card course-card">
            <div class="sncard-img">
                <img src="{{ asset('/logo.png') }}" class="card-img-top img-responsive lazy"
                    alt="About MSc Entrance Preparation" title="About MSc Entrance Preparation">
            </div>
            <div class="card-body">
                <hr>
                <strong class="card-title card__title_font_size">
                    <a href="{{ route('pages.course-list', 'about-msc-entrance-preparation') }}">About
                        MSc Entrance Preparation</a>
                </strong>
                <p class="card-text">Learn about the MSc Entrance Preparation programs and their
                    benefits.</p>
            </div>
            <a href="{{ route('pages.course-list', 'about-msc-entrance-preparation') }}" class="hovered">
                <span class="btn btn-trans-primary text-white">Learn More <i class="icon-arrow-chevrolet"></i></span>
            </a>
        </div>
    </div>
    <div class="item course-list-col col-md-4 col-lg-4">
        <div class="card course-card">
            <div class="sncard-img">
                <img src="{{ asset('/logo.png') }}" class="card-img-top img-responsive lazy" alt="Syllabus"
                    title="Syllabus">
            </div>
            <div class="card-body">
                <hr>
                <strong class="card-title card__title_font_size">
                    <a href="{{ route('pages.course-list', 'syllabus') }}">Syllabus</a>
                </strong>
                <p class="card-text">Explore the detailed syllabus for MSc Entrance Preparation.</p>
            </div>
            <a href="{{ route('pages.course-list', 'syllabus') }}" class="hovered">
                <span class="btn btn-trans-primary text-white">Learn More <i class="icon-arrow-chevrolet"></i></span>
            </a>
        </div>
    </div>
    <div class="item course-list-col col-md-4 col-lg-4">
        <div class="card course-card">
            <div class="sncard-img">
                <img src="{{ asset('/logo.png') }}" class="card-img-top img-responsive lazy" alt="Class Offered"
                    title="Class Offered">
            </div>
            <div class="card-body">
                <hr>
                <strong class="card-title card__title_font_size">
                    <a href="{{ route('pages.course-list', 'class-offered') }}">Class Offered</a>
                </strong>
                <p class="card-text">Find out about the classes offered for MSc Entrance Preparation.
                </p>
            </div>
            <a href="{{ route('pages.course-list', 'class-offered') }}" class="hovered">
                <span class="btn btn-trans-primary text-white">Learn More <i class="icon-arrow-chevrolet"></i></span>
            </a>
        </div>
    </div>
</div>

</div>
</div>
</div>
</section>
--}}

{{-- <div class="placement-logos placement-logo-top">
    <div class="container">
        <div class="heading-sub text-center">
            <h2>Our Placement Partners</h2>
            <p class="heading-text">Since 2008, the year we began our journey as a professional IT Learning
                Institute, we have seen many of our students become part of organizations and, as a result, they
                have furthered their careers in their area of expertise. Our Placement Partners have granted
                opportunities to our students which, we can proudly say, they have duly taken!
            </p>
        </div>
        <div class="logo-wrapper">
            <ul class="logo-list text-center">
                <li>
                    <div class="img">
                        <img alt="" src="/ui/images/placement-partners/cloud.jpg" title="" class="img-responsive lazy"
                            style="">
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img alt="" src="/ui/images/placement-partners/subisu.jpg" title="" class="img-responsive lazy"
                            style="">
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img alt="" src="/ui/images/placement-partners/triangle.jpg" title=""
                            class="img-responsive lazy" style="">
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img alt="" src="/ui/images/placement-partners/net-tv.jpg" title="" class="img-responsive lazy"
                            style="">
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img alt="" src="/ui/images/placement-partners/pathao.jpg" title="" class="img-responsive lazy"
                            style="">
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img alt="" src="/ui/images/placement-partners/code-himlaya.jpg" title=""
                            class="img-responsive lazy" style="">
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img alt="" src="/ui/images/placement-partners/vianet.jpg" title="" class="img-responsive lazy"
                            style="">
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div> --}}
<section class="section-wrapper assets-wrapper">
    <div class="container p-0" style="">
        <div class="row" style="
        -webkit-box-shadow: 0 0px 6px rgb(0 0 0 / .12);
            /* box-shadow: 0 3px 18px rgb(0 0 0 / .12); */
            border-radius: 5px;
            padding: 25px 0px 0px;
                margin: 0px;
        ">
        <div class="heading-sub text-center">
            <header class="section-header">
                <div class="header-title pt-2">
                    <h4>Our Strength Our Assets</h4>
                </div>
            </header>
            <p class="heading-text">
                Line Academy provides expert services in five areas: industry-focused training, engineering license
                preparation, coaching classes, MSc entrance preparation, and Lok Sewa classes. With a cutting-edge
                curriculum and guidance from seasoned instructors, we offer career counseling, resume support, and job
                placement assistance to help students and professionals succeed in their careers.
            </p>
        </div>
        <div class="section-body">
            <div class="row assets-row gutter-less">
                <div class="col-sm-6 col-lg-4 bg-blue">
                    <div class="col-content">
                        <div class="ico-holder">
                            <img src="/ui/images/svg-icons/ico-precious.svg" alt="Precious and Happy Clients">
                        </div>
                            <!--<div class="value">275<sup>+</sup></div>-->
                        <div class="frame">Experienced and dedicated Faculty</div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="img">
                        <img src="/ui/images/story1.jpg" class="img-responsive lazy" style="">
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 bg-green">
                    <div class="col-content">
                        <div class="ico-holder">
                            <img src="/ui/images/svg-icons/ico-professional.svg"
                                alt="Professional IT Training Institute in Nepal">
                        </div>
                        <div class="value">#1</div>
                        <div class="frame">Well equiped classrooms </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="img">
                        <img src="/ui/images/story2.jpg" class="img-responsive lazy" style="">
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 bg-blue">
                    <div class="col-content">
                        <div class="ico-holder">
                            <img src="/ui/images/svg-icons/ico-student-certificate.svg"
                                alt="Student Certified and Job Placement">
                        </div>
                        <div class="value">10K<sup>+</sup></div>
                        <div class="frame">Experienced classes</div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="img">
                        <img src="/ui/images/story3.jpg" class="img-responsive lazy" style="">
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="hero-frame">-->
        <!--    <div class="container">-->
        <!--        <div class="col">-->
        <!--            <a href="/training">-->
        <!--                <div class="ico">1-->
        <!--                </div>-->
        <!--                <strong class="title">B.E Coaching Classes</strong>-->
        <!--            </a>-->
        <!--        </div>-->
        <!--        <div class="col">-->
        <!--            <a href="/project-work">-->
        <!--                <div class="ico">2-->
        <!--                </div>-->
        <!--                <strong class="title">NEC License Preparation</strong>-->
        <!--            </a>-->
        <!--        </div>-->
        <!--        <div class="col">-->
        <!--            <a href="/evaluation">-->
        <!--                <div class="ico">3-->
        <!--                </div>-->
        <!--                <strong class="title">Trainings</strong>-->
        <!--            </a>-->
        <!--        </div>-->
        <!--        <div class="col">-->
        <!--            <a href="/internship-placement">-->
        <!--                <div class="ico">4-->
        <!--                </div>-->
        <!--                <strong class="title">MSc Entrance Preparation</strong>-->
        <!--            </a>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        </div>
    </div>
</section>

<section class="section-wrapper testimonial-wrapper" style="padding-bottom: 25px !important;">
    <div class="container p-0">
        <div class="row box pt-4">
            <div class="col-md-12 col-lg-12 col-sm-12 col half-panel">
            <!--<div class="heading-sub  text-center">-->
                <!--<div class="ico"><img src="/ui/images/svg-icons/icon-testimonial.svg" alt="Testimonials"></div>-->
            <!--    <h2></h2>-->
            <!--</div>-->
            <header class="section-header">
                <div class="header-title">
                    <h4>Our Location</h4>
                </div>
            </header>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col half-panel">
                <div class="row">
                    <div class="col-12">
                        <div class="text">
                            <p><strong>Centrally Located:</strong> Line Academy is situated in a prime, easily
                                accessible area of the city, ensuring students and staff are close to key business and
                                commercial hubs.</p>
                            <p> Just 200 meters from LABIM Mall, the academy offers students quick access to shopping,
                                dining, and entertainment options.</p>
                            <p><strong>Excellent Public Transport Connectivity:</strong> The academy is accessible by
                                all major bus routes, providing students with convenient and reliable transportation
                                options from all parts of the city.</p>
                            <p><strong>Ample Parking Facilities:</strong> The academy offers on-site parking, making it
                                convenient for students and visitors who prefer to drive, ensuring a hassle-free
                                experience for those commuting by their own vehicle.</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col half-panel">
                <div class="row">
                    <div class="col col-12">
                        <div class="iframe-ratio ratio-16x9">
                            <iframe width="100%" height="400" src="https://www.youtube.com/embed/H757un6YemY"
                                title="Location of LINE ACADEMY" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-wrapper testimonial-wrapper success-wrapper">
    <div class="container">
        <header class="section-header pb-3">
            <div class="header-title">
                <h4>What Our Students Say</h4>
            </div>
        </header>
        <!--<div class="heading-sub text-center">-->
            <!--<div class="ico">-->
            <!--    <img src="/ui/images/svg-icons/ico-success-stories.svg" alt="Success Story">-->
            <!--</div>-->
            <!--<h2>What Our Students Say</h2>-->
        <!--    <p class="heading-text">-->
        <!--        By providing value-added services we have guided hundreds of businesses to attain competitive-->
        <!--        advantage and inspired thousands of professionals to excel in their career.-->
        <!--    </p>-->
        <!--</div>-->

        @php
        $success_stories = App\Models\SuccessStory::all();
        @endphp

        <div class="owl-carousel owl-theme success-stories-carousel">
            @foreach ($success_stories as $key => $successStory)
            @if($key < 3) <!-- Show only the first 3 cards initially -->
                <div class="item card-container" data-bs-toggle="modal" data-bs-target="#storyModal"
                    data-bs-name="{{ $successStory->name }}" data-bs-college="{{ $successStory->college }}"
                    data-bs-description="{{ $successStory->description }}"
                    data-bs-image="{{ asset($successStory->image) }}">
                    <div class="card success-card">
                        <div class="img">
                            <img src="{{ asset($successStory->image) }}"
                                title="Successful student from {{ $successStory->college }} {{ $successStory->name }}"
                                alt="Successful student from {{ $successStory->college }} {{ $successStory->name }}"
                                class="img-responsive" />
                        </div>
                        <div class="text">
                            <div class="frame">
                                <h3 class="name">{{ $successStory->name }}</h3>
                            </div>
                            <ul class="plain-list">
                                <li>
                                    <span class="left">Faculty:</span>
                                    <span class="value">{{ $successStory->faculty }}</span>
                                </li>
                                <li>
                                    <span class="left">College:</span>
                                    <span class="value">{{ $successStory->college }}</span>
                                </li>
                                <li>
                                    <hr>
                                    <div class="text-wrapper">
                                        <span class="description-text">
                                            {!! $successStory->description !!}
                                        </span>
                                        <span class="read-more-link">Read More</span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
        </div>
    </div>
</section>

<!-- Modal to show the full details of a clicked card -->
<div class="modal fade" id="storyModal" tabindex="-1" aria-labelledby="storyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="storyModalLabel">Success Story</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-card-content">
                    <!-- Card content will be cloned here -->
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section-wrapper placement-logos">
    <div class="container">
        <header class="section-header">
            <div class="header-title">
                <h4>Our Partners</h4>
            </div>
        </header>
        <div class="logo-wrapper">
            <ul class="logo-list text-center">
                <!--<li>-->
                <!--    <a href="#">-->
                <!--        <img class="owl-lazy img-responsive lazy"-->
                <!--            src="{{ asset('/ourpartners/7bb1b799-c906-4501-9d70-52b93c579769.jpeg') }}"-->
                <!--            title="Rastriya Banijya Bank Limited" style="">-->
                <!--    </a>-->
                <!--</li>-->
                <li>
                    <a href="#">
                        <img class="owl-lazy img-responsive lazy" src="{{ asset('/ourpartners/second.jpeg') }}"
                            title="Rastriya Banijya Bank Limited" style="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="owl-lazy img-responsive lazy"
                            src="{{ asset('/ourpartners/c0ebc798-13c5-43e7-9113-fc76a0eece90.jpeg') }}"
                            title="Rastriya Banijya Bank Limited" style="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="owl-lazy img-responsive lazy"
                            src="https://gibl-assets.gibl.com.np/uploads/About%20US/global-ime-logo-svg.svg"
                            title="Rastriya Banijya Bank Limited" style="">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection