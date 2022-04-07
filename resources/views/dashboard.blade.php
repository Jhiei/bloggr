@extends('template')

@section('styles', 'pages/feed/feed.css')

@section('title', '')

@section('content')
    <main class="main-body">
        <div class="feed">
            <div class="feed-write">
                <div class="feed-write-intro">
                    <div class="feed-write-intro-img">
                        @if(!isset(Auth::user()->profile_img_path))
                        <img src="{{ asset('images/empty-prof.svg') }}" alt="empty profile pic" class="main-hdr-nav-profile-img">
                        @else
                        <img src="{{ asset('storage/profile/' . Auth::user()->profile_img_path) }}" alt="empty profile pic" class="profile-img">
                        @endif
                    </div>
                    <div class="feed-write-intro-blink-text">
                        <h1 class="feed-write-intro-text" id="heading">Feeling like a writer today, {{ Auth::user()->username }}?</h1>
                    </div>
                </div>
                <div class="feed-write-topic">
                    <span class="feed-write-topic-sh">Trending:</span>
                    <ul class="feed-write-topic-list">
                        <li class="feed-write-topic-li">Genshin Impact</li>
                        <li class="feed-write-topic-li">Finance</li>
                        <li class="feed-write-topic-li">ESports</li>
                        <li class="feed-write-topic-li">Twitch</li>
                        <li class="feed-write-topic-li">Valorant</li>
                    </ul>
                </div>
            </div>
            <div class="feed-blog">
                <h1>blog</h1>
            </div>
        </div>
        <div class="user-container">
            <div class="user-container-main">
                <a class="user" href="{{ route('profile-view', [Auth::user()->username, Auth::user()->id]) }}">
                    <div class="user-img-container">
                        @if(!isset(Auth::user()->profile_img_path))
                        <img src="{{ asset('images/empty-prof.svg') }}" alt="" class="main-hdr-nav-profile-img">
                        @else
                        <img src="{{ asset('storage/profile/' . Auth::user()->profile_img_path) }}" alt="empty profile pic" class="profile-img">
                        @endif
                    </div>
                    <div class="user-name-container">
                        <span class="user-real-name">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</span>
                        <span class="user-user-name">{{ Auth::user()->username }}</span>
                    </div>
                </a>
            </div>
        </div>
    </main>

    <div class="blog-create-modal" style="display: none;">
        <form action="{{ route('blog-store') }}" method="POST" class="blog-create-modal-form" enctype="multipart/form-data">
            @csrf
            <h2 class="blog-create-modal-form-heading">{{ __('Blog Details') }}</h2>
            <div class="blog-create-modal-form-input-field img-input-field">
                <label for="blog-tnail" class="image-input">
                    <div class="image-input-container">
                        <img id="thumbnail" src="{{ asset('images/tnail.svg') }}" alt="prompt user to enter thumbnail">
                    </div>
                </label>
                <input type="file" name="blog_tnail" id="blog-tnail" accept="image/*" onchange="loadFile(event)" required>
            </div>
            <div class="blog-create-modal-form-input-field">
                <label class="text-input-labels" for="blog-title">Title</label>
                <input type="text" name="blog_title" id="blog-title" required>
            </div>
            <div class="blog-create-modal-form-input-field">
                <label class="text-input-labels" for="blog-desc">Description</label>
                <textarea name="blog_desc" id="blog-desc" required></textarea>
            </div>
            <div class="blog-create-modal-form-input-field-btn">
                <button type="button" class="cancel-btn">Cancel</button>
                <input type="submit" value="Continue">
            </div>
        </form>
    </div>

    <script>
        $(() => {
            let count = 0;
            let arr = [
                'Feeling like a writer today, {{ Auth::user()->username }}?', 
                'Express your thoughts in words.', 
                "Keep the momentum, words will flow."
            ];

            setInterval(() => {
                count++;
                $('#heading').fadeOut(750, function() {
                    $(this).text(arr[count]).fadeIn(750);
                });

                if (count == arr.length) {
                    count = 0;
                }
            }, 10000);
        });
    </script>
    <script src="{{ asset('js/feed/blog-create-modal.js') }}"></script>
    <script src="{{ asset('js/feed/display-on-upload.js') }}"></script>
    <script src="{{ asset('js/feed/modal-form-labels.js') }}"></script>
@endsection