@extends('admin_template')

@section('styles', 'admin/dashboard/dashboard.css')

@section('title', '| Admin Dashboard')

@section('content')
    <section class="welcome">
        <div class="welcome-user-img">
            @if(!isset(Auth::user()->profile_img_path))
            <img src="{{ asset('images/empty-prof.svg') }}" alt="empty profile pic" class="main-hdr-nav-profile-img">
            @else
            <img src="{{ asset('storage/profile/' . Auth::user()->profile_img_path) }}" alt="empty profile pic" class="profile-img">
            @endif
        </div>
        <div class="welcome-user-text">
            <h2 class="welcome-heading">Hello, {{ Auth::user()->username }}. Welcome.</h2>
            <p class="welcome-text">
                Welcome to your dashboard. Here you can quickly access features available only to the administrators of Bloggr.
            </p>
        </div>
    </section>

    <section class="admin-tools">
        
    </section>
@endsection