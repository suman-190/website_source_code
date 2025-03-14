<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="">
            <img src="{{ asset('ui/images/logo_set.png') }}" alt="" height="40px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item">
                    <div id="custom-search" class="top-search-bar">
                        <input class="form-control" type="text" placeholder="Search..">
                    </div>
                </li>

                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ (Str::ucfirst(Auth::user()->image)) }}" alt="" class="user-avatar-md rounded-circle"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name"> {{ Str::ucfirst(Auth::user()->email) }} </h5>
                        </div>
                        <a class="dropdown-item" href="{{ route('admin.profile.index') }}"><i class="fas fa-user mr-2"></i>My Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-power-off mr-2"></i>{{ __('Logout') }}</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
