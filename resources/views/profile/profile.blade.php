@extends('template')

@section('styles', 'pages/profile/profile.css')

@section('title', '| Profile')

@section('content')
    <main class="main-profile">
        <section class="user-details">
            <div class="user-details-img">
                @if(!isset(Auth::user()->profile_img_path))
                <img src="{{ asset('images/empty-prof.svg') }}" alt="empty profile pic" class="main-hdr-nav-profile-img">
                @else
                <img src="{{ asset('images/empty-prof.svg') }}" alt="empty profile pic" class="main-hdr-nav-profile-img">
                @endif
            </div>
            <div class="user-details-info">
                
            </div>
        </section>
    </main>
@endsection