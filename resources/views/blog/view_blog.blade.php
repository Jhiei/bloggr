@extends('template')

@section('styles', 'pages/blog/view.css')

@section('title', '| ' . $this_blog->blog_title)

@section('content')
    <main class="main-blog">
        <section class="blog-content" style="font-family: {{ $this_blog->blog_font }};">
            {!! $this_blog->blog_html !!}
        </section>
        <section class="user-content">
            <div class="user-content-main">
                <a class="user" href="{{ route('profile-view', [Auth::user()->username, Auth::user()->id]) }}">
                    <div class="user-img-container">
                        @if(!isset($this_blog->user->profile_img_path))
                        <img src="{{ asset('images/empty-prof.svg') }}" alt="" class="main-hdr-nav-profile-img">
                        @else
                        <img src="{{ asset('storage/profile/' . Auth::user()->profile_img_path) }}" alt="empty profile pic" class="main-hdr-nav-profile-img">
                        @endif
                    </div>
                    <div class="user-name-container">
                        <span class="user-real-name">{{ $this_blog->user->fname }} {{ $this_blog->user->lname }}</span>
                        <span class="user-user-name">{{ $this_blog->user->username }}</span>
                    </div>
                </a>
                @if(isset($this_blog->user->bio))
                <div class="user-bio">
                    <span class="user-bio-label">Biography</span>
                    <p class="user-bio-text">{{ $this_blog->user->bio }}</p>
                </div>
                @endif
                @if(isset($this_blog->user->website_url))
                <div class="user-url">
                    <span class="user-url-label">Website</span>
                    <a href="{{ $this_blog->user->website_url }}" class="user-url-text">{{ $this_blog->user->website_url }}</a>
                </div>
                @endif
            </div>
        </section>
    </main>

    <script src="{{ asset('js/blog/remove-attr.js') }}"></script>
@endsection