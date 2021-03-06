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
            </div>
            <div class="user-details-info">
                <div class="user-details-info-name">
                    <span class="user-details-info-user-name"><span>@</span>{{ Auth::user()->username }}</span>
                    <span class="user-details-info-real-name">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</span>
                    <a href="{{ route('settings-view') }}" class="user-edit-profile-btn">{{ __('Edit Profile') }}</a>
                </div>
                <div class="user-details-info-nums">
                    <ul class="user-details-info-nums-list">
                        <li class="user-details-info-nums-li">{{ $blog_count }} blogs</li>
                        <li class="user-details-info-nums-li">{{ $follow_count }} followers</li>
                        <li class="user-details-info-nums-li">{{ $following_count }} following</li>
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
                            @php
                                $like_count = 0;
                            @endphp
                            @foreach($all_likes as $like)
                                @if($like->blog_id == $blog->id)
                                    @php
                                        $like_count++;
                                    @endphp
                                @endif
                            @endforeach
                            <span class="like-nums">@php echo $like_count; @endphp</span>
                        </div>
                        <div class="blog-details-item-nums-comms">
                            <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                            @php
                                $follow_count = 0;
                            @endphp
                            @foreach($all_comments as $comm)
                                @if($comm->blog_id == $blog->id)
                                    @php
                                        $follow_count++;
                                    @endphp
                                @endif
                            @endforeach
                            <span class="comm-nums">@php echo $follow_count; @endphp</span>
                        </div>
                    </div>
                </div>
                <p class="blog-details-item-desc" style="display: none;">{{ $blog->blog_desc }}</p>
                <a class="blog-details-item-link" href="{{ route('blog-view', [$blog->id, $blog->blog_title]) }}" style="display: none;"></a>
            </div>
            @endforeach
            @else
            <h2 class="no-published-blogs">This user has not published any blogs.</h2>
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
    
    <script src="{{ asset('js/profile/blog-dialog.js') }}"></script>
@endsection