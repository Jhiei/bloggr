<header class="hdr-container">
    <div class="main-hdr">
        <div class="main-hdr-logo">
            <img src="{{ asset('images/logo.svg') }}" alt="logo inside header container">
        </div>
        <div class="main-hdr-search">
            <form action="" method="GET" class="main-hdr-search-form">
                @csrf
                <input type="text" name="search" id="search" placeholder="Search">
                <input type="submit">
            </form>
        </div>
        <div class="main-hdr-nav">
            <nav class="main-hdr-nav-container">
                <ul class="main-hdr-nav-list">
                    <a href="{{ route('rdr') }}"><li class="main-hdr-nav-list-links">
                        <img src="{{ asset('images/home.svg') }}" alt="">
                    </li></a>
                    <a href="#"><li class="main-hdr-nav-list-links">
                        <img src="{{ asset('images/trend.svg') }}" alt="">
                    </li></a>
                    <a href="#"><li class="main-hdr-nav-list-links">
                        <img src="{{ asset('images/notif.svg') }}" alt="">
                    </li></a>
                </ul>
            </nav>
            <div class="main-hdr-nav-profile-container">
                @if(!isset(Auth::user()->profile_img_path))
                <img src="{{ asset('images/empty-prof.svg') }}" alt="" class="main-hdr-nav-profile-img">
                @endif
                <div class="drop-container">
                    <ul class="drop-container-list">
                        <a href="#"><li class="drop-container-li">Profile</li></a>
                        <a href="#"><li class="drop-container-li">Settings</li></a>
                        <a href="#"><li class="drop-container-li">Sign Out</li></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>