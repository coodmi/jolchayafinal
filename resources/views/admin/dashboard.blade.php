@extends('admin.layouts')

@section('content')
    <div class="content-area">
        @include('admin.overview')
        @include('admin.home')
        @include('admin.about')
        @include('admin.projects')
        @include('admin.bookingsTab')
        @include('admin.visitBookingsTab')
        @include('admin.registrationsTab')
        @include('admin.newsTab')
        @include('admin.headerTab')
        @include('admin.footerTab')
        @include('admin.siteSettingsTab')
    </div>
@endsection