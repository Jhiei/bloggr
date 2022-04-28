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
                reported and once they receive three warnings, they
                are suspended or possibly banned from using Bloggr.
            </p>
        </div>
    </section>
@endsection