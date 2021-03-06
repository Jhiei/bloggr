<header class="hdr-container">
    <div class="main-hdr">
        <div class="main-hdr-logo">
            <a href="{{ route('rdr') }}"><img src="{{ asset('images/logo.svg') }}" alt="logo inside header container"></a>
        </div>
        <!-- <div class="main-hdr-search">
            <form action="" method="GET" class="main-hdr-search-form">
                @csrf
                <input type="text" name="search" id="search" placeholder="Search">
                <input type="submit">
            </form>
        </div> -->
        <div class="main-hdr-nav">
            <nav class="main-hdr-nav-container">
                <ul class="main-hdr-nav-list">
                    <a href="{{ route('rdr') }}"><li class="main-hdr-nav-list-links">
                        <img src="{{ asset('images/home.svg') }}" alt="">
                    </li></a>
                </ul>
            </nav>
            <div class="main-hdr-nav-profile-container">
                @if(!isset(Auth::user()->profile_img_path))
                <img src="{{ asset('images/empty-prof.svg') }}" alt="" class="main-hdr-nav-profile-img">
                @else
                <img src="{{ asset('storage/profile/' . Auth::user()->profile_img_path) }}" alt="empty profile pic" class="main-hdr-nav-profile-img">
                @endif
                <div class="drop-container">
                    <ul class="drop-container-list">
                        @if(Auth::user()->is_admin == 1)
                        <a href="{{ route('admin-dashboard') }}"><li class="drop-container-li">Admin</li></a>
                        @endif
                        <a href="{{ route('profile-view', [Auth::user()->username, Auth::user()->id]) }}"><li class="drop-container-li">Profile</li></a>
                        <a href="{{ route('settings-view') }}"><li class="drop-container-li">Settings</li></a>
                        <a href="#" class="logout-btn"><li class="drop-container-li">Sign Out</li></a>
                    </ul>
                    <form action="{{ route('logout') }}" method="POST" style="display: none;" class="logout-form">
                    @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>