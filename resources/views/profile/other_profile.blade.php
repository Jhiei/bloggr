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
                        <li class="user-details-info-nums-li">{{ $follow_count }} followers</li>
                        <li class="user-details-info-nums-li">{{ $following_count }} following</li>
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
                @if(Auth::user()->id != $user->id)
                    @if(!isset($follow_exists))
                    <div class="user-details-follow follow-btn">
                        <form action="javascript: void(0)" method="POST" class="user-details-follow-form">
                            @csrf
                            <input type="hidden" name="auth_user_id" id="auth-user-id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="user_id" id="view-user-id" value="{{ $user->id }}">
                            <button type="submit" class="user-details-follow-btn">{{ __('Follow') }}</button>
                        </form>
                    </div>
                    <div class="user-details-follow unfollow-btn" style="display: none;">
                        <form action="javascript: void(0)" method="POST" class="user-details-unfollow-form">
                            @csrf
                            <input type="hidden" name="auth_user_id" id="auth-user-id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="user_id" id="view-user-id" value="{{ $user->id }}">
                            <button type="submit" class="user-details-follow-btn">{{ __('Unfollow') }}</button>
                        </form>
                    </div>
                    @else
                    <div class="user-details-follow unfollow-btn">
                        <form action="javascript: void(0)" method="POST" class="user-details-unfollow-form">
                            @csrf
                            <input type="hidden" name="auth_user_id" id="auth-user-id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="user_id" id="view-user-id" value="{{ $user->id }}">
                            <button type="submit" class="user-details-follow-btn">{{ __('Unfollow') }}</button>
                        </form>
                    </div>
                    <div class="user-details-follow follow-btn" style="display: none;">
                        <form action="javascript: void(0)" method="POST" class="user-details-follow-form">
                            @csrf
                            <input type="hidden" name="auth_user_id" id="auth-user-id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="user_id" id="view-user-id" value="{{ $user->id }}">
                            <button type="submit" class="user-details-follow-btn">{{ __('Follow') }}</button>
                        </form>
                    </div>
                    @endif
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
                                $count = 0;
                            @endphp
                            @foreach($all_comments as $comm)
                                @if($comm->blog_id == $blog->id)
                                    @php
                                        $count++;
                                    @endphp
                                @endif
                            @endforeach
                            <span class="comm-nums">@php echo $count; @endphp</span>
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
    <script src="{{ asset('js/profile/follow.js') }}"></script>
    <script>
        $("form.user-details-follow-form").submit(function(e) {
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
                url: "{{ route('user-follow') }}",
                data: $(this).serialize(),
                dataType: "json",
                encode: true,
            }).done(function (data) {
                console.log(data);
            });
        });

        $("form.user-details-unfollow-form").submit(function(e) {
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
                url: "{{ route('user-unfollow') }}",
                data: $(this).serialize(),
                dataType: "json",
                encode: true,
            }).done(function (data) {
                console.log(data);
            });
        });
    </script>
@endsection