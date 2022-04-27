@extends('admin_template')

@section('styles', 'admin/users/users.css')

@section('title', '| Manage Users')

@section('content')
    <section class="users">
        <div class="users-heading-text">
            <h2 class="users-heading">Manage Users</h2>
            <p class="users-text">
                Here, you can manage the users within the platform. 
                If users need help in editing their profile, you may help them
                change their usernames. Also, users can be removed within the platform
                by clicking the red button beside their name. This way, users and bots who
                misuse the platform can be removed from using Bloggr.
            </p>
            <div class="users-input-field">
                <input class="users-search" type="text" placeholder="Enter user data..." id="user-search">
                <button type="button">Browse</button>
            </div>
        </div>
    </section>
    <section class="all-users">
        <div class="all-users-labels">
            <span class="all-users-id">{{ __('ID') }}</span>
            <span class="all-users-name">{{ __('Name') }}</span>
            <span class="all-users-username">{{ __('Username') }}</span>
            <span class="all-users-type">{{ __('User Type') }}</span>
            <span class="all-users-email">{{ __('Email') }}</span>
            <span class="all-users-utility">{{ __('Utility') }}</span>
        </div>
        <ul class="all-users-list">
            @foreach($users as $user)
            <li class="all-users-list-li">
                <span class="users-id">{{ $user->id }}</span>
                <span class="users-name">{{ $user->fname }} {{ $user->lname }}</span>
                <span class="users-username">{{ $user->username }}</span>
                <span class="users-type">{{ $user->user_type }}</span>
                <span class="users-email">{{ $user->email }}</span>
                <span class="users-utility">
                    <button type="button" class="users-edit-btn"><ion-icon name="create-outline"></ion-icon></button>
                    <button type="button" class="users-delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
                </span>
            </li>
            @endforeach
        </ul>
    </section>

    <div class="edit-modal" style="display: none;">
        <form action="#" class="edit-modal-form" method="POST">
            <input type="hidden" value="" class="user-id-to-rep">
        </form>
    </div>
    
    <script src="{{ asset('js/admin/user-search.js') }}"></script>
    <script src="{{ asset('js/admin/user-edit-modal.js') }}"></script>
@endsection