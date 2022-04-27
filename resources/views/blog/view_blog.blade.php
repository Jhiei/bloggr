@extends('template')

@section('styles', 'pages/blog/view.css')

@section('title', '| ' . $this_blog->blog_title)

@section('content')
    <main class="main-blog">
        <section class="blog-content" style="font-family: {{ $this_blog->blog_font }};">
            <div class="blog-content-container">
                <img class="blog-content-container-img" src="{{ asset('storage/thumbnail/' . $this_blog->blog_tnail_path) }}" alt="">
                {!! $this_blog->blog_html !!}
                <!-- TODO: finish like function -->
                <div class="heart-icon-container">
                    @if(!isset($like_exists))
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon heart-icon" viewBox="0 0 512 512">
                        <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="#FFF" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon heart-icon-2" viewBox="0 0 512 512" style="display: none;">
                        <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="#EE5757" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                    </svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon heart-icon-2" viewBox="0 0 512 512">
                        <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="#EE5757" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon heart-icon" viewBox="0 0 512 512" style="display: none;">
                        <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="#FFF" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                    </svg>
                    @endif

                    <form action="#" method="POST" class="like-form">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{ $this_blog->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    </form>
                </div>
            </div>
            <div class="blog-comment">
                <h2 class="blog-comment-heading">{{ __('Comments') }}</h2>
                <form action="{{ route('comments-store') }}" class="blog-comment-form" method="POST">
                    @csrf
                    <div class="blog-comment-input-field">
                        <textarea name="comment" id="comment" placeholder="Write a comment..."></textarea>
                        <input type="hidden" name="blog_id" value="{{ $this_blog->id }}">
                        <input type="submit" value="Post">
                    </div>
                </form>
                <div class="blog-comments-container">
                    <ul class="blog-comments-list">
                        @foreach($comments as $comm)
                        <li class="blog-comments-li-{{ $comm->id }}">
                            <div class="blog-comments-li-user-img">
                                @if(!isset($comm->user->profile_img_path))
                                <img src="{{ asset('images/empty-prof.svg') }}" alt="empty profile pic" class="comment-user-img">
                                @else
                                <img src="{{ asset('storage/profile/' . $comm->user->profile_img_path) }}" alt="empty profile pic" class="profile-img">
                                @endif
                            </div>
                            <div class="blog-comments-li-user-comm">
                                <span class="blog-comments-li-user-name">{{ $comm->user->username }}</span>
                                <span class="blog-comments-li-comment-text">{{ $comm->comment_text }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
        <section class="user-content">
            <div class="user-content-main">
                <a class="user" href="{{ route('user-profile-view', [$this_blog->user->username, $this_blog->user->id]) }}">
                    <div class="user-img-container">
                        @if(!isset($this_blog->user->profile_img_path))
                        <img src="{{ asset('images/empty-prof.svg') }}" alt="" class="view-blog-user-img">
                        @else
                        <img src="{{ asset('storage/profile/' . $this_blog->user->profile_img_path) }}" alt="empty profile pic" class="main-hdr-nav-profile-img">
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
    <script>
        var speed = 100;
        var heart = $('.heart-icon');
        var heart2 = $('.heart-icon-2');
        var form = $('.like-form');

        heart.on('click', function() {
            $(this).fadeToggle(speed);
            heart2.delay(speed).fadeToggle(speed);

            form.attr('action', '{{ route("blog-like") }}');
            form.submit();
        });

        heart2.on('click', function() {
            $(this).fadeToggle(speed);
            heart.delay(speed).fadeToggle(speed);

            form.attr('action', '{{ route("blog-unlike") }}');
            form.submit();
        });

        form.submit(function(e) {
            var formData = {
                auth_user: $("#auth-user-id").val(),
                user: $("#view-user-id").val(),
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                encode: true,
            }).done(function (data) {
                console.log(data);
            });

            e.preventDefault();
        });
    </script>
@endsection