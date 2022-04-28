<div class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-container-links">
            <a href="{{ route('dashboard') }}">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </a>
            <a href="{{ route('admin-dashboard') }}">
                <ion-icon name="apps-outline"></ion-icon>
            </a>
            <a href="">
                <ion-icon name="analytics-outline"></ion-icon>
            </a>
            @if(Auth::user()->is_admin == 1)
            <a href="{{ route('admin-manage-users') }}">
                <ion-icon name="chevron-up-circle-outline"></ion-icon>
            </a>
            @endif
            <a href="{{ route('admin-reports-view') }}">
                <ion-icon name="alert-circle-outline"></ion-icon>
            </a>
        </div>
        <div class="sidebar-container-settings">
            <a href="{{ route('settings-view') }}">
                <ion-icon name="settings-outline"></ion-icon>
            </a>
        </div>
    </div>
</div>
<div class="content">