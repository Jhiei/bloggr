@extends('template')

@section('styles', 'pages/profile/profile.css')

@section('title', '| Profile')

@section('content')
    <main class="main-profile">
        <section class="user-details">
            <div class="user-details-img">
                @if(!isset($user->profile_img_path))
                <img src="{{ asset('images/empty-prof.svg') }}" alt="empty profile pic" class="user-details-profile-img">
                @else
                <img src="{{ asset('storage/profile/' . $user->profile_img_path) }}" alt="empty profile pic" class="user-details-profile-img">
                @endif
            </div>
            <div class="user-details-info">
                <div class="user-details-info-name">
                    <span class="user-details-info-user-name"><span>@</span>{{ $user->username }}</span>
                    <span class="user-details-info-real-name">{{ $user->fname }} {{ $user->lname }}</span>
                </div>
                <div class="user-details-info-nums">
                    <ul class="user-details-info-nums-list">
                        <li class="user-details-info-nums-li">{{ $blog_count }} blogs</li>
                        <li class="user-details-info-nums-li">9 followers</li>
                        <li class="user-details-info-nums-li">9 following</li>
                        <li class="user-details-info-nums-li">99 blog points</li>
                    </ul>
                </div>
                @if(isset($user->bio))
                <div class="user-details-info-bio">
                    <p class="user-details-info-user-bio">{{ $user->bio }}</p>
                </div>
                @endif
                @if(isset($user->website_url))
                <div class="user-details-info-link">
                    <a class="user-details-info-hyperlink" href="{{ $user->website_url }}">{{ $user->website_url }}</a>
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
            <button class="blog-modal-close-btn">
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>
    </div>

    <script src="{{ asset('js/profile/user-info.js') }}"></script>
    <script src="{{ asset('js/profile/blog-dialog.js') }}"></script>
@endsection