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
        <form action="{{ route('admin-manage-users-save') }}" class="edit-modal-form" method="POST">
            @csrf
            <h2 class="edit-modal-form-heading">Edit User Data</h2>
            <div class="input-field-name">
                <div class="edit-modal-input-field">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" value="" class="user-fname-to-rep">
                </div>
                <div class="edit-modal-input-field">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" value="" class="user-lname-to-rep">
                </div>
            </div>
            <div class="edit-modal-input-field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="" class="user-username-to-rep">
            </div>
            <div class="edit-modal-input-field">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="" class="user-email-to-rep">
            </div>
            <div class="edit-modal-input-field">
                <label for="user_type">User Type</label>
                <input type="text" id="user_type" name="user_type" value="" class="user-type-to-rep">
            </div>
            <div class="edit-input-btn">
                <button type="button" class="edit-close-modal">Cancel</button>
                <input type="submit" value="Update">
            </div>
            <input type="hidden" name="user_id" value="" class="user-id-to-rep">
        </form>
    </div>

    <div class="del-modal" style="display: none;">
        <form action="{{ route('admin-manage-users-remove') }}" class="del-modal-form" method="POST">
            @csrf
            <h2 class="del-modal-form-heading">Remove User</h2>
            <p class="del-modal-form-par">Are you sure you want to remove this user? THis action cannot be undone.</p>
            <div class="del-input-btn">
                <button type="button" class="del-close-modal">Cancel</button>
                <input type="submit" value="Remove">
            </div>
            <input type="hidden" name="user_id" value="" class="del-user-id">
        </form>
    </div>
    
    <script src="{{ asset('js/admin/user-search.js') }}"></script>
    <script src="{{ asset('js/admin/user-edit-modal.js') }}"></script>
    <script src="{{ asset('js/admin/user-del-modal.js') }}"></script>
@endsection