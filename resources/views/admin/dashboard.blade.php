@extends('admin.layouts')

@section('content')

            <!-- Content Area -->
            <div class="content-area">
                <!-- Overview Tab -->
                @include('admin.overview')
                
                <!-- Home Tab -->
                @include('admin.home')

                <!-- About Tab -->
                @include('admin.about')

                <!-- Projects Tab -->
                @include('admin.projects')

                <!-- Bookings Tab -->
                @include('admin.bookingsTab')

                <!-- Registrations Tab -->
                @include('admin.registrationsTab')

                <!-- News Tab -->
                @include('admin.newsTab')

                <!-- Header Tab -->
                @include('admin.headerTab')

                <!-- Footer Tab -->
                @include('admin.footerTab')

                <!-- Footer Preview Tab -->
                @include('admin.footerPreviewTab')

                <!-- Contact Preview Tab -->
                @include('admin.contactTab')

               <!-- setting Tab -->
                @include('admin.setting')

                <!-- Site Settings Tab -->
                @include('admin.siteSettingsTab')

            </div>


@endsection