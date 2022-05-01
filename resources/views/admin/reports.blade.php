@extends('admin_template')

@section('styles', 'admin/reports/reports.css')

@section('title', '| User Report')

@section('content')
    <section class="reports">
        <div class="reports-heading-text">
            <h2 class="reports-heading">User and Blog Reports</h2>
            <p class="reports-text">
                To maintain the platform user-friendly and appropriate,
                users can report blogs that contains any content that
                may not be suitable to viewers unless viewer discretion
                was advised and conveys professionalism. Users can get
                reported and once they receive seven warnings, they are
                removed from the platform.
            </p>
        </div>
    </section>

    <section class="user-reports-container">
        <div class="user-reports-heading-container">
            <h2 class="user-reports-heading">User Reports</h2>
            <ion-icon name="caret-down-outline"></ion-icon>
        </div>
        <div class="user-reports-labels">
            <span class="user-reports-id">{{ __('Report ID') }}</span>
            <span class="user-reports-reporter-email">{{ __('Reporter Email') }}</span>
            <span class="user-reports-reported-name">{{ __('Reported Name') }}</span>
            <span class="user-reports-reported-email">{{ __('Reported Email') }}</span>
            <span class="user-reports-reported-email">{{ __('Report Submitted At') }}</span>
            <span class="user-reports-utility"></span>
        </div>
        <ul class="user-reports-list">
            @foreach($user_reports as $ur)
            <li class="user-reports-list-li">
                <span class="reports-id">{{ $ur->id }}</span>
                @foreach($all_users as $user)
                @if($user->id == $ur->reporter_id)
                <span class="reports-reporter-email">{{ $user->email }}</span>
                @endif
                @endforeach
                <span class="reports-reported-name">{{ $ur->user->fname }} {{ $ur->user->lname }}</span>
                <span class="reports-reported-email">{{ $ur->user->email }}</span>
                <span class="reports-reported-email">{{ $ur->created_at }}</span>
                <span class="reports-utility">
                    <button type="button" class="reports-dropdown-btn"><ion-icon name="caret-down-outline"></ion-icon></button>
                </span>
            </li>
            <div class="user-report-content">
                <p class="user-report-text">{{ $ur->report_text }}</p>
                <div class="user-report-btn">
                    <button type="button" class="user-report-btn-ack">Acknowledge</button>
                    <button type="button" class="user-report-btn-dismiss">Dismiss Report</button>
                    <span class="report-id" style="display: none;">{{ $ur->id }}</span>
                </div>
            </div>
            @endforeach
        </ul>
    </section>

    <section class="blog-reports-container">
        <div class="blog-reports-heading-container">
            <h2 class="blog-reports-heading">Blog Reports</h2>
            <ion-icon name="caret-down-outline"></ion-icon>
        </div>
        <div class="blog-reports-labels">
            <span class="blog-reports-id">{{ __('Report ID') }}</span>
            <span class="blog-reports-reporter-email">{{ __('Reporter Email') }}</span>
            <span class="blog-reports-reported-name">{{ __('Reported Name') }}</span>
            <span class="blog-reports-reported-email">{{ __('Reported Email') }}</span>
            <span class="blog-reports-reported-email">{{ __('Report Submitted At') }}</span>
            <span class="blog-reports-utility"></span>
        </div>
        <ul class="blog-reports-list">
            @foreach($blog_reports as $ur)
            <li class="blog-reports-list-li">
                <span class="reports-id">{{ $ur->id }}</span>
                @foreach($all_users as $user)
                @if($user->id == $ur->reporter_id)
                <span class="reports-reporter-email">{{ $user->email }}</span>
                @endif
                @endforeach
                <span class="reports-reported-name">{{ $ur->user->fname }} {{ $ur->user->lname }}</span>
                <span class="reports-reported-email">{{ $ur->user->email }}</span>
                <span class="reports-reported-email">{{ $ur->created_at }}</span>
                <span class="reports-utility">
                    <button type="button" class="reports-dropdown-btn"><ion-icon name="caret-down-outline"></ion-icon></button>
                </span>
            </li>
            <div class="blog-report-content">
                <ul class="blog-report-blog-details">
                    <li class="blog-report-blog-details-li">Blog ID: {{ $ur->blog->id }}</li>
                    <li class="blog-report-blog-details-li">Title: {{ $ur->blog->blog_title }}</li>
                </ul>
                <p class="blog-report-text">{{ $ur->report_text }}</p>
                <div class="blog-report-btn">
                    <button type="button" class="blog-report-btn-ack">Acknowledge</button>
                    <button type="button" class="blog-report-btn-dismiss">Dismiss Report</button>
                    <span class="report-id" style="display: none;">{{ $ur->id }}</span>
                </div>
            </div>
            @endforeach
        </ul>
    </section>

    <form action="" class="submit-report-form" style="display: none;" method="POST">
        @csrf
        <input type="hidden" value="" name="report_id" class="report-id-to-rep">
    </form>

    @if(session()->has('ack_msg'))
    <p class="ack-msg">{{ session()->get('ack_msg') }}</p>
    @endif

    @if(session()->has('dismiss_msg'))
    <p class="dismiss-msg">{{ session()->get('dismiss_msg') }}</p>
    @endif

    <script>
        var ack_btn_user = $('.user-report-btn-ack');
        var ack_btn_blog = $('.blog-report-btn-ack');
        var dismiss_btn = $('.user-report-btn-dismiss, .blog-report-btn-dismiss');
        var report_id = $('.report-id');
        var form = $('.submit-report-form');
        var idToRep = $('.report-id-to-rep');

        ack_btn_user.on('click', function() {
            idToRep.val($(this).siblings('.report-id').text());

            form.attr('action', '{{ route("admin-reports-ack-user") }}');
            form.submit();
        });

        ack_btn_blog.on('click', function() {
            idToRep.val($(this).siblings('.report-id').text());

            form.attr('action', '{{ route("admin-reports-ack-blog") }}');
            form.submit();
        });

        dismiss_btn.on('click', function() {
            idToRep.val($(this).siblings('.report-id').text());

            form.attr('action', '{{ route("admin-reports-dismiss") }}');
            form.submit();
        });
    </script>
    <script src="{{ asset('js/admin/report.js') }}"></script>
@endsection