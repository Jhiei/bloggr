@extends('template')

@section('styles', 'pages/profile/profile.css')

@section('title', '| Profile')

@section('content')
    <main class="main-profile">
        <section class="user-details">
            <div class="user-details-img">
                @if(!isset(Auth::user()->profile_img_path))
                <img src="{{ asset('images/empty-prof.svg') }}" alt="empty profile pic" class="user-details-profile-img">
                @else
                <img src="{{ asset('storage/profile/' . Auth::user()->profile_img_path) }}" alt="empty profile pic" class="user-details-profile-img">
                @endif
                <button class="user-details-img-edit-btn">
                    {{ __('Upload Profile') }}
                </button>
            </div>
            <div class="user-details-info">
                <div class="user-details-info-name">
                    <span class="user-details-info-user-name"><span>@</span>{{ Auth::user()->username }}</span>
                    <span class="user-details-info-real-name">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</span>
                </div>
                <div class="user-details-info-nums">
                    <ul class="user-details-info-nums-list">
                        <li class="user-details-info-nums-li">{{ $blog_count }} blogs</li>
                        <li class="user-details-info-nums-li">9 followers</li>
                        <li class="user-details-info-nums-li">9 following</li>
                        <li class="user-details-info-nums-li">99 blog points</li>
                    </ul>
                </div>
                @if(isset(Auth::user()->bio))
                <div class="user-details-info-bio">
                    <p class="user-details-info-user-bio">{{ Auth::user()->bio }}</p>
                </div>
                @endif
                @if(isset(Auth::user()->website_url))
                <div class="user-details-info-link">
                    <a class="user-details-info-hyperlink" href="{{ Auth::user()->website_url }}">{{ Auth::user()->website_url }}</a>
                </div>
                @endif
            </div>
        </section>
        <section class="blog-details">
            @if(count($blog_list) > 0)
            @foreach($blog_list as $blog)
            <div class="blog-details-item">
                <div class="blog-details-item-img">
                    <img class="blog-details-item-img-dialog" src="{{ asset('storage/thumbnail/' . $blog->blog_tnail_path) }}" alt="">
                </div>
                <div class="blog-details-item-text">
                    <span class="blog-details-item-title">{{ $blog->blog_title }}</span>
                    <div class="blog-details-item-nums">
                        <div class="blog-details-item-nums-likes">
                            <ion-icon name="heart-circle-outline"></ion-icon>
                            <span>0</span>
                        </div>
                        <div class="blog-details-item-nums-comms">
                            <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                            <span>0</span>
                        </div>
                    </div>
                </div>
                <p class="blog-details-item-desc" style="display: none;">{{ $blog->blog_desc }}</p>
                <a class="blog-details-item-link" href="{{ route('blog-view', [$blog->id, $blog->blog_title]) }}" style="display: none;"></a>
            </div>
            @endforeach
            @else
            <h1>This user has not published any blogs.</h1>
            @endif
        </section>
    </main>

    <div class="upload-profile-modal" style="display: none;">
        <form action="{{ route('profile-upload') }}" class="upload-profile-modal-form" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="profile-img-label" for="profile-img">
                <div class="image-input-container">
                    <img id="thumbnail" src="{{ asset('images/tnail.svg') }}" alt="prompt user to enter thumbnail">
                </div>
            </label>
            <input class="profile-img-input" type="file" name="profile_img" id="profile-img" accept="image/*" onchange="loadFile(event)" required>
            <div class="profile-img-submit">
                <button type="button" class="close-modal-btn">{{ __('Cancel') }}</button>
                <input type="submit" value="Save">
            </div>
            <input type="hidden" value="{{ $user_id }}" name="user_id">
        </form>
    </div>

    <div class="blog-modal" style="display: none;">
        <div class="blog-modal-container">
            <div class="blog-modal-img">
                <img src="" alt="">
            </div>
            <div class="blog-modal-text">
                <div class="blog-modal-text-container">
                    <h2 class="blog-modal-text-heading"></h2>
                    <p class="blog-modal-text-desc"></p>
                </div>
                <a href="" class="blog-modal-link">Read Blog</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/profile/user-info.js') }}"></script>
    <script src="{{ asset('js/feed/display-on-upload.js') }}"></script>
    <script src="{{ asset('js/profile/blog-dialog.js') }}"></script>
@endsection