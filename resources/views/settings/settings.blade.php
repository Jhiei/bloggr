@extends('template')

@section('styles', 'pages/settings/settings.css')

@section('title', '| Settings')

@section('content')
    <main class="main-settings">
        <div class="main-settings-container">
            <section class="main-settings-tabs">
                <ul class="tabs-list">
                    <a href="#edit-profile" class="tabs-list-li-link"><li class="tabs-list-li">Edit Profile</li></a>
                    <a href="#change-password" class="tabs-list-li-link"><li class="tabs-list-li">Change Password</li></a>
                    <a href="#sign-out" class="tabs-list-li-link"><li class="tabs-list-li">Sign Out</li></a>
                </ul>
            </section>
            <section class="main-settings-field">
                <form action="{{ route('settings-edit-profile') }}" method="POST" class="main-settings-edit-profile" enctype="multipart/form-data">
                    @csrf
                    <div class="edit-profile-img">
                        <div class="edit-profile-img-container">
                            @if(!isset(Auth::user()->profile_img_path))
                            <img id="thumbnail" src="{{ asset('images/empty-prof.svg') }}" alt="empty profile pic" class="user-details-profile-img">
                            @else
                            <img id="thumbnail" src="{{ asset('storage/profile/' . Auth::user()->profile_img_path) }}" alt="empty profile pic" class="user-details-profile-img">
                            @endif
                        </div>
                        <div class="edit-profile-input-field">
                            <span class="edit-profile-img-username"><span>@</span>{{ Auth::user()->username }}</span>
                            <label for="edit-profile-img-upload" style="width: fit-content;">Upload Image</label>
                            <input id="edit-profile-img-upload" name="profile_img" type="file" style="display: none;" accept="image/*" onchange="loadFile(event)">
                        </div>
                    </div>
                    <div class="edit-profile-name">
                        <label for="profile-name" class="edit-profile-label">Name</label>
                        <div class="edit-profile-name-container">
                            <input type="text" required name="profile_name" id="profile-name" class="edit-profile-input" value="{{ Auth::user()->fname }}" placeholder="First Name">
                            <input type="text" required name="profile_lname" id="profile-lname" class="edit-profile-input" value="{{ Auth::user()->lname }}" placeholder="Last Name">
                            <small class="edit-profile-note">Note: You can only change your name once every month.</small>
                        </div>
                    </div>
                    <div class="edit-profile-username">
                        <label for="profile-username" class="edit-profile-label">Username</label>
                        <input type="text" required name="profile_username" id="profile-username" class="edit-profile-input" placeholder="@if(!isset(Auth::user()->username))Enter username here... @endif" value="{{ Auth::user()->username }}">
                    </div>
                    <div class="edit-profile-bio">
                        <label for="profile-bio" class="edit-profile-label">Bio</label>
                        <textarea name="profile_bio" id="profile-bio" class="edit-profile-input" placeholder="@if(!isset(Auth::user()->bio))Enter bio here... @endif">@if(isset(Auth::user()->bio)) {{ Auth::user()->bio }} @endif</textarea>
                    </div>
                    <div class="edit-profile-link">
                        <label for="profile-link" class="edit-profile-label">Link</label>
                        <input text="text" name="profile_link" id="profile-link" class="edit-profile-input" placeholder="@if(!isset(Auth::user()->website_url))Enter link here... @endif" value="{{ Auth::user()->website_url }}">
                    </div>
                    <div class="edit-profile-email">
                        <label for="profile-email" class="edit-profile-label">Email</label>
                        <input text="email" required name="profile_email" id="profile-email" class="edit-profile-input" placeholder="@if(!isset(Auth::user()->email))Enter email here... @endif" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="edit-profile-save-btn">
                        <input type="submit" value="Save">
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                </form>
            </section>
        </div>
    </main>

    <script src="{{ asset('js/feed/display-on-upload.js') }}"></script>
    <script src="{{ asset('js/settings/check-link.js') }}"></script>
@endsection