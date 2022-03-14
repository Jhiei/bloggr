@extends('template')

@section('styles', 'pages/feed/feed.css')

@section('content')
    <main class="main-body">
        <div class="feed">
            <div class="feed-write">
                <div class="feed-write-intro">
                    <div class="feed-write-intro-img">
                        @if(!isset(Auth::user()->profile_img_path))
                        <img src="{{ asset('images/empty-prof.svg') }}" alt="" class="main-hdr-nav-profile-img">
                        @endif
                    </div>
                    <div class="feed-write-intro-blink-text">
                        <h1 class="feed-write-intro-text" id="heading">Feeling like a writer today, {{ Auth::user()->fname }}?</h1>
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
                
            </div>
        </div>
        <div class="user-container">
            <div class="user">
                <h1>something</h1>
            </div>
        </div>
    </main>

    <script>
        $(() => {
            let count = 0;
            let arr = ['Feeling like a writer today, {{ Auth::user()->fname }}?', 
            'Express your thoughts in words.', 
            "Keep the momentum, words will flow."];

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
@endsection