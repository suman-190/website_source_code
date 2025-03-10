<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">

                    <li class="nav-divider">
                        Questions
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11d"
                            aria-controls="submenu-11">
                            <i class="far fa-clone"></i></i>Exam Set
                        </a>
                        <div id="submenu-11d" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.examset.index') }}"> Exam Set </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.examset.create') }}"> Add Set </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11ds"
                            aria-controls="submenu-11">
                            <i class="far fa-clone"></i></i>Question
                        </a>
                        <div id="submenu-11ds" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.question.index') }}"> Questions </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.question.create') }}"> Add Question </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="{{ route('admin') }}"><i
                                class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(2) == 'post' ? 'active' : '' }}" data-toggle="collapse"
                            aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1">
                            <i class="far fa-clone"></i></i>Post
                        </a>
                        <div id="submenu-1" class="collapse submenu {{ request()->segment(2) == 'post' ? 'show' : '' }}"
                            style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->segment(2) == 'post' && request()->segment(3) == null ? 'active' : '' }}"
                                        href="/admin/post">All Post </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->segment(2) == 'post' && request()->segment(3) == null ? 'active' : '' }}"
                                        href="/admin/post/add"> Add Post </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->segment(2) == 'post' && request()->segment(3) == null ? 'active' : '' }}"
                                        href="/admin/tags"> Tags </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11"
                            aria-controls="submenu-11">
                            <i class="far fa-clone"></i></i>Banner
                        </a>
                        <div id="submenu-11" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/carousel') }}"> Banners </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/carousel-add') }}"> Add Banner </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2">
                            <i class="far fa-newspaper"></i>Courses
                        </a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/courses') }}"> Courses </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/courses-add') }}">Add Courses</a>
                                </li>

                            </ul>
                        </div>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(2) == 'category' ? 'active' : '' }}" href="#"
                            data-toggle="collapse" aria-expanded="false" data-target="#submenu-3"
                            aria-controls="submenu-3">
                            <i class="far fa-flag"></i>Parent Courses
                        </a>
                        <div id="submenu-3"
                            class="collapse submenu {{ request()->segment(2) == 'category' ? 'show' : '' }}"
                            style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->segment(2) == 'category' && request()->segment(3) == null ? 'active' : '' }}"
                                        href="/admin/category"> Parent Courses </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->segment(2) == 'category' && request()->segment(3) == null ? 'active' : '' }}"
                                        href="/admin/category/add"> Add Parent Courses</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(2) == 'subcategory' ? 'active' : '' }}"
                            href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10"
                            aria-controls="submenu-10">
                            <i class="far fa-flag"></i>All Courses
                        </a>
                        <div id="submenu-10"
                            class="collapse submenu {{ request()->segment(2) == 'subcategory' ? 'show' : '' }}"
                            style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->segment(2) == 'subcategory' && request()->segment(3) == null ? 'active' : '' }}"
                                        href="/admin/subcategory"> Courses </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->segment(2) == 'subcategory' && request()->segment(3) == null ? 'active' : '' }}"
                                        href="/admin/subcategory/add"> Add Courses</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" aria-expanded="false" data-target="#submenu-27" aria-controls="submenu-27">
                            <i class="far fa-newspaper"></i>Country
                        </a>
                        <div id="submenu-27" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/country') }}"> Country </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/country-add') }}">Add Country</a>
                                </li>

                            </ul>
                        </div>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">
                            <i class="far fa-flag"></i>College
                        </a>
                        <div id="submenu-3" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/college') }}">  College </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/college-add') }}"> Add College</a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-4" aria-controls="submenu-4">
                            <i class="far fa-calendar-alt"></i>Gallery
                        </a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/gallery') }}"> All Gallery </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/gallery-add') }}"> Add Image </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-9" aria-controls="submenu-9">
                            <i class="far fa-calendar-alt"></i>Video
                        </a>
                        <div id="submenu-9" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/video') }}"> All Video </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/video-add') }}"> Add Video </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5">
                            <i class="fas fa-users"></i>Social Links</a>
                        <div id="submenu-5" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/links') }}"> All Links </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/links-add') }}"> Add Links </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8">
                            <i class="far fa-newspaper"></i>Messages</a>
                        <div id="submenu-8" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/message') }}"> All Messages </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/message-add') }}"> Add Messages </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-20" aria-controls="submenu-20">
                            <i class="far fa-newspaper"></i>Contact Info</a>
                        <div id="submenu-20" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/feedback') }}"> All Contact us </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/feedback-add') }}"> Add feedbacks </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-23" aria-controls="submenu-23">
                            <i class="far fa-newspaper"></i>Feedbacks</a>
                        <div id="submenu-23" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/feed') }}"> All Feedback </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/feedback-add') }}"> Add feedbacks </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(2) == 'ads' ? 'active' : '' }}" href="#"
                            data-toggle="collapse" aria-expanded="false" data-target="#submenu-19"
                            aria-controls="submenu-19">
                            <i class="fas fa-images"></i>Ads</a>
                        <div id="submenu-19"
                            class="collapse submenu {{ request()->segment(2) == 'ads' ? 'show' : '' }}"
                            style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->segment(2) == 'ads' && request()->segment(3) == null ? 'active' : '' }}"
                                        href="{{ url('/admin/ads') }}"> All ads </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->segment(2) == 'ads' && request()->segment(3) == null ? 'active' : '' }}"
                                        href="{{ url('/admin/ads/add') }}"> Add ads </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ (request()->segment(2) == 'adsposition') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-18" aria-controls="submenu-18">
                            <i class="fas fa-images"></i>Ads Position</a>
                        <div id="submenu-18" class="collapse submenu {{ (request()->segment(2) == 'adsposition') ? 'show' : '' }}" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ ((request()->segment(2) == 'adsposition') && (request()->segment(3) == null)) ? 'active' : '' }}" href="{{ url('/admin/adsposition') }}"> Ads Position </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ ((request()->segment(2) == 'adsposition') && (request()->segment(3) == null)) ? 'active' : '' }}" href="{{ url('/admin/adsposition/add') }}"> Add Ads Position </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                    <li class="nav-divider">
                        Users
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7"
                            aria-controls="submenu-7">
                            <i class="fas fa-user"></i> Manage Users </a>
                        <div id="submenu-7" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/users') }}"> Users </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" aria-expanded="false" data-target="#submenu-111"
                            aria-controls="submenu-111">
                            <i class="fas fa-cogs"></i> Setting </a>
                        <div id="submenu-111" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/setting') }}"> Manage Site.all info.
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
