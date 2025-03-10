@php
use App\Helpers\Helper;
@endphp
<style>
.sn-icon {
    height: 35px;
    width: 35px;
    border-radius: 50%;
    overflow: hidden;
    background-color: #004aad;
    color: white;
    font-size: 20px;
    padding: 3px 7px;
    margin-top: auto;
    margin-bottom: auto;
}

@media only screen and (max-width: 767.5px) {
    .sn-icon {
        display: none;
    }
}
</style>
<header id="header" class="fixed-top">
    {{-- <div class="header-top-bar">
        Dashain Offer - 20% Discount on All Exam!
        <a href="{{ route('exam.form') }}" class="btn btn-icon btn-black"> Give Exam <i
        class="fas fa-arrow-right"></i></a>

    @auth

    <a href="{{ route('logout') }}" class="btn btn-icon btn-black "
        style=" background: rgb(17, 92, 138);   padding-right: 10px;"> Logout</a>
    <a href="{{ route('exam.profile') }}" class="btn btn-icon btn-black "
        style=" background: rgb(17, 92, 138);   padding-right: 10px;"> Profile</a>
    @else
    <a href="{{ route('login') }}" class="btn btn-icon btn-black"> Login</a>
    @endauth
    </div> --}}
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-2 col-sm-6" style="padding-left: 0 !important;">
                <a class="navbar-brand" href="{{ route('home') }}" style="transition: max-height linear .3s !important">
                    <img src="/logo.png" alt="Line Academy - Logo">
                </a>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="header-mid">
                    <div class="header-center">
                        <form class="search-box" id="courseSearch" method="GET"
                            action="{{route('pages.course-search')}}">
                            <input class="form-control" value="" type="search" id="search" name="search"
                                placeholder="What do you want to learn today?" aria-label="Search" autocomplete="off">
                            <button class="btn btn-link" type="submit"><i class="fa fa-search"></i>
                            </button>
                        </form>
                        <div class="vis_toc"></div>
                        <ul class="navbar-nav main-nav">
                            <li class="nav-item dropdown has-mega-menu">
                                <a class="nav-link dropdown-toggle sknav" id="navbarDropdown bg_filter" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bars"></i> All Courses
                                </a>
                            </li>

                        </ul>
                        <div class="sticky-side-menu side-open" style="display: none;">
                            <span class="closeThes fs-3" style="display: inline;"><i class="fas fa-times"></i></span>
                            <div class="sidemenu">
                                <div class="tab-menu mobile-menu">
                                    <ul>
                                        <!-- Button 1: Home -->
                                        <li>
                                            <a href="{{ route('home') }}">Home</a>
                                        </li>

                                        <!-- Button 2: About Us -->
                                        <li class="has-sub-menu">
                                            <a href="javascript:void(0)" class="sub_tab">About Us <i
                                                    class="fas fa-angle-right arrow-custom"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('pages.welcome-message') }}">Welcome Message</a>
                                                </li>
                                                <li><a href="{{ route('pages.mission-vision') }}">Our Mission/Vision</a>
                                                </li>
                                                <li><a href="{{ route('pages.our-team') }}">Our Team</a></li>
                                                <li><a href="{{ route('pages.our-facilities') }}">Our Facilities</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <!-- Button 3: B.E Coaching Classes -->
                                        <li class="has-sub-menu">
                                            <a href="javascript:void(0)" class="sub_tab">B.E. Coaching <i
                                                    class="fas fa-angle-right arrow-custom"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('pages.course-list', 'ioe') }}">I.O.E</a></li>
                                                <li><a href="{{ route('pages.course-list', 'pokhara-university') }}">Pokhara
                                                        University</a></li>
                                                <li><a href="{{ route('pages.course-list', 'purwanchal-university') }}">Purwanchal
                                                        University</a></li>
                                                <li><a href="{{ route('pages.course-list', 'others') }}">Others</a></li>
                                            </ul>
                                        </li>

                                        <!-- Button 4: NEC License Preparation Classes -->
                                        <li class="has-sub-menu">
                                            <a href="javascript:void(0)" class="sub_tab">NEC License Preparation <i
                                                    class="fas fa-angle-right arrow-custom"></i></a>
                                            <ul class="sub-menu">
                                                <?php
                                                    // NEC License Preparation Classes
                                                    $necLicenseIds = App\Models\Category::where('status', 'active')
                                                    ->whereIn('slag', [
                                                        'civil-engineering-acie',
                                                    ])
                                                    ->limit(12)
                                                    ->get();
                                            
                                                    $necLicense = App\Models\Category::where('status', 'active')
                                                    ->whereIn('parent_id', $necLicenseIds->pluck('id'))
                                                    ->limit(14)
                                                    ->get();
                                                ?>
                                                @foreach ($necLicense as $category)
                                                <li><a
                                                        href="{{ route('pages.course-detail',$category->slag) }}">{{ $category->name }}</a>
                                                </li>
                                                @endforeach
                                                <!--<li><a href="{{ route('pages.course-list', 'civil-engineering-acie') }}">Civil Engineering (ACiE)</a></li>-->
                                                <!--<li><a href="{{ route('pages.course-list', 'mechanical-engineering-amee') }}">Mechanical Engineering (AMeE)</a></li>-->
                                                <!--<li><a href="{{ route('pages.course-list', 'electrical-engineering-aeie') }}">Electrical Engineering (AEIE)</a></li>-->
                                                <!--<li><a href="{{ route('pages.course-list', 'electrical-and-electronics-engineering-aeee') }}">Electrical and Electronics Engineering (AEEE)</a></li>-->
                                                <!--<li><a href="{{ route('pages.course-list', 'computer-engineering-acte') }}">Computer Engineering (ACtE)</a></li>-->
                                                <!--<li><a href="{{ route('pages.course-list', 'electronics-and-communication-engineering-aexe') }}">Electronics and Communication Engineering (AExE)</a></li>-->
                                                <!--<li><a href="{{ route('pages.course-list', 'electronics-communication-and-information-engineeringaeie') }}">Electronics, Communication and Information Engineering (AEiE)</a></li>-->
                                                <!--<li><a href="{{ route('pages.course-list', 'information-technology-engineering-aite') }}">Information Technology Engineering (AItE)</a></li>-->
                                            </ul>
                                        </li>

                                        <!-- Button 5: Trainings -->
                                        <li class="has-sub-menu">
                                            <a href="javascript:void(0)" class="sub_tab">Trainings <i
                                                    class="fas fa-angle-right arrow-custom"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('pages.course-list', 'it-trainings') }}">IT
                                                        Trainings</a></li>
                                                <li><a href="{{ route('pages.course-list', 'engineering-trainings') }}">Engineering
                                                        Trainings</a></li>
                                                <li><a
                                                        href="{{ route('pages.course-list', 'professional-trainings') }}">Professional
                                                        Trainings</a></li>
                                            </ul>
                                        </li>

                                        <!-- Button 6: MSc Entrance Preparation -->
                                        <li class="has-sub-menu">
                                            <a href="javascript:void(0)" class="sub_tab">MSc Entrance Preparation <i
                                                    class="fas fa-angle-right arrow-custom"></i></a>
                                            <ul class="sub-menu">
                                                <li><a
                                                        href="{{ route('pages.course-list', 'about-msc-entrance-preparation') }}">About
                                                        MSc Entrance Preparation</a></li>
                                                <li><a href="{{ route('pages.course-list', 'syllabus') }}">Syllabus</a>
                                                </li>
                                                <li><a href="{{ route('pages.course-list', 'class-offered') }}">Class
                                                        Offered</a></li>
                                            </ul>
                                        </li>

                                        <li class="has-sub-menu">
                                            <a href="javascript:void(0)" class="sub_tab">Loksewa Preparation <i
                                                    class="fas fa-angle-right arrow-custom"></i></a>
                                            <ul class="sub-menu">
                                                <li><a
                                                        href="{{ route('pages.course-detail', 'nea-electrical-engineer-level-7') }}">NEA-Electrical
                                                        Engineer Level 7</a></li>
                                                <li><a
                                                        href="{{ route('pages.course-detail', 'nea-electrical-supervisor-level-5') }}">NEA-Electrical
                                                        Supervisor Level 5</a></li>
                                                <li><a
                                                        href="{{ route('pages.course-detail', 'nea-computer-engineer-level-7') }}">NEA-Computer
                                                        Engineer Level 7</a></li>
                                                <li><a
                                                        href="{{ route('pages.course-detail', 'nea-civil-engineer-level-7') }}">NEA-Civil
                                                        Engineer Level 7</a></li>
                                                <li><a
                                                        href="{{ route('pages.course-detail', 'computer-engineer-computer-officer') }}">Computer
                                                        Engineer/Computer Officer</a></li>
                                                <li><a href="{{ route('pages.course-detail', 'computer-operator') }}">Computer
                                                        Operator</a></li>
                                            </ul>
                                        </li>
                                        <!-- Button 7: Contact Us -->
                                        <li>
                                            <a href="{{ route('pages.contact-us') }}">Contact Us</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('exam.form') }}" class="btn default-btn"
                                                style="color: white;border-radius: 0;">Mock Test <i
                                                    class="fa fa-arrow-right"></i></a>
                                        </li>
                                         @auth
                                        <li>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                                out</a>
                                        </li>
                                        @endauth
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="header-right d-flex" style="justify-content: space-between; gap: 5px;">
                    <div class="sn-icon">
                        <i class="fa-solid fa-phone"></i>

                    </div>
                    <div class="tel" style="text-align: left !important;">
                        Contact Us: <a href="tel:+977-9749424636" target="">
                            +977-9749424636
                        </a>
                        <br>
                        <a href="tel:01-5445555" class="“”" target="">
                            01-5445555 </a>
                        &nbsp;/ <a href="tel:+977-9763604776" class="“”" target="">
                            +977-9763604776 </a>
                    </div>
                    <div class="btn-holder show-desktop text__upperCase">
                        {{-- <a href="{{ route('pages.send-enquiry') }}" class="btn default-btn">Send Enquiry <i
                            class="fa fa-arrow-right"></i></a> --}}
                        <a href="{{ route('exam.form') }}" class="btn default-btn">Mock Test <i
                                class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="social_link">-->
    <!--    <a href="tel:+977 9865052095" data-faitracker-click-bind="true">-->
    <!--        <div><img src="/ui/images/svg-icons/phone-call_link.png" width="45" height="45" alt="Call Us"></div>-->
    <!--        <div>Call Us</div>-->
    <!--    </a>-->
    <!--    <a href="https://www.facebook.com/LineAcademy.edu.np" target="_blank" data-faitracker-click-bind="true">-->
    <!--        <div><img src="/ui/images/svg-icons/facebook_link.png" width="45" height="45" alt="Facebook"></div>-->
    <!--        <div>Follow Us</div>-->
    <!--    </a>-->
    <!--    <a href="https://www.linkedin.com/company/line-academy-la" target="_blank" data-faitracker-click-bind="true">-->
    <!--        <div><img src="/ui/images/svg-icons/linkedin_link.png" width="45" height="45" alt="Linkedin"></div>-->
    <!--        <div>Linkedin</div>-->
    <!--    </a>-->
    <!--    <a href="{{ route('pages.send-enquiry') }}" target="_blank" data-faitracker-click-bind="true">-->
    <!--        <div><img src="/ui/images/svg-icons/help.png" width="45" height="45" alt="Enquiry"></div>-->
    <!--        <div>Send Enquiry</div>-->
    <!--    </a>-->
    <!--</div>-->
    <div class="scroll-bar">
        <div class="container" style="padding-left: 0;">
            <div class="content-menu-wrapper">
                <ul class="content-menu">
                    <!-- Button 1: Home -->
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>

                    <!-- Button 2: About Us -->
                    <li class="dropdown sn-hv">
                        <a class="dropdown-toggle" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            About Us
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                            <li><a class="dropdown-item" href="{{route('pages.welcome-message')}}">Welcome Message</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('pages.mission-vision')}}">Our Mission/Vision</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('pages.our-team')}}">Our Team</a></li>
                            <li><a class="dropdown-item" href="{{route('pages.our-facilities')}}">Our Facilities</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Button 3: B.E Coaching Classes -->
                    <li class="dropdown sn-hv">
                        <a class="dropdown-toggle" href="#" id="beDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            B.E. Coaching
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="beDropdown">
                            <li><a class="dropdown-item" href="{{ route('pages.course-list', 'ioe') }}">I.O.E</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.course-list', 'pokhara-university') }}">Pokhara University</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.course-list', 'purwanchal-university') }}">Purwanchal
                                    University</a></li>
                            <li><a class="dropdown-item" href="{{ route('pages.course-list', 'others') }}">Others</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Button 4: NEC License Preparation Classes -->
                    <li class="dropdown sn-hv">
                        <a class="dropdown-toggle" href="#" id="necDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            NEC License Preparation
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="necDropdown">
                            <?php
                                // NEC License Preparation Classes
                                $necLicenseIds = App\Models\Category::where('status', 'active')
                                ->whereIn('slag', [
                                    'civil-engineering-acie',
                                ])
                                ->limit(12)
                                ->get();
                        
                                $necLicense = App\Models\Category::where('status', 'active')
                                ->whereIn('parent_id', $necLicenseIds->pluck('id'))
                                ->limit(14)
                                ->get();
                            ?>
                            @foreach ($necLicense as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.course-detail',$category->slag) }}">{{ $category->name }}</a>
                            </li>
                            @endforeach
                            <!--<li><a class="dropdown-item" href="{{ route('pages.course-list', 'civil-engineering-acie') }}">Civil Engineering (ACiE)</a></li>-->
                            <!--<li><a class="dropdown-item" href="{{ route('pages.course-list', 'mechanical-engineering-amee') }}">Mechanical Engineering (AMeE)</a></li>-->
                            <!--<li><a class="dropdown-item" href="{{ route('pages.course-list', 'electrical-engineering-aeie') }}">Electrical Engineering (AEIE)</a></li>-->
                            <!--<li><a class="dropdown-item" href="{{ route('pages.course-list', 'electrical-and-electronics-engineering-aeee') }}">Electrical and Electronics Engineering (AEEE)</a></li>-->
                            <!--<li><a class="dropdown-item" href="{{ route('pages.course-list', 'computer-engineering-acte') }}">Computer Engineering (ACtE)</a></li>-->
                            <!--<li><a class="dropdown-item" href="{{ route('pages.course-list', 'electronics-and-communication-engineering-aexe') }}">Electronics and Communication Engineering (AExE)</a></li>-->
                            <!--<li><a class="dropdown-item" href="{{ route('pages.course-list', 'electronics-communication-and-information-engineeringaeie') }}">Electronics, Communication and Information Engineering (AEiE)</a></li>-->
                            <!--<li><a class="dropdown-item" href="{{ route('pages.course-list', 'information-technology-engineering-aite') }}">Information Technology Engineering (AItE)</a></li>-->
                        </ul>
                    </li>

                    <!-- Button 5: Trainings -->
                    <li class="dropdown sn-hv">
                        <a class="dropdown-toggle" href="#" id="trainingsDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Trainings
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="trainingsDropdown">
                            <li><a class="dropdown-item" href="{{ route('pages.course-list', 'it-trainings') }}">IT
                                    Trainings</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.course-list', 'engineering-trainings') }}">Engineering
                                    Trainings</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.course-list', 'professional-trainings') }}">Professional
                                    Trainings</a></li>
                        </ul>
                    </li>

                    <!-- Button 6: MSc Entrance Preparation -->
                    <li class="dropdown sn-hv">
                        <a class="dropdown-toggle" href="#" id="mscDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            MSc Entrance Preparation
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="mscDropdown">
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.course-list', 'about-msc-entrance-preparation') }}">About MSc
                                    Entrance Preparation</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.course-list', 'syllabus') }}">Syllabus</a></li>
                            <li><a class="dropdown-item" href="{{ route('pages.course-list', 'class-offered') }}">Class
                                    Offered</a></li>
                        </ul>
                    </li>
                    <!-- Button 7: Loksewa Subjects -->
                    <li class="dropdown sn-hv">
                        <a class="dropdown-toggle" href="#" id="loksewaDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Loksewa Preparation
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="loksewaDropdown">

                            <li><a class="dropdown-item"
                                    href="{{ route('pages.course-detail', 'nea-electrical-engineer-level-7') }}">NEA-Electrical
                                    Engineer Level 7</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.course-detail', 'nea-electrical-supervisor-level-5') }}">NEA-Electrical
                                    Supervisor Level 5</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.course-detail', 'nea-computer-engineer-level-7') }}">NEA-Computer
                                    Engineer Level 7</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.course-detail', 'nea-civil-engineer-level-7') }}">NEA-Civil
                                    Engineer Level 7</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.course-detail', 'computer-engineer-computer-officer') }}">Computer
                                    Engineer/Computer Officer</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('pages.course-detail', 'computer-operator') }}">Computer Operator</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('pages.contact-us') }}">Contact Us</a>
                    </li>
                    @auth
                    <li>
                        <form class="d-none" action="{{ route('logout') }}" method="get" id="logout-form">
                            @csrf
                        </form>
                        <a href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                            out</a>
                    </li>
                    @endauth


                </ul>


            </div>
        </div>
    </div>
</header>