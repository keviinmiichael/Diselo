<!doctype html>
<html lang="es">
<head>
    @include('front.partials.head')
    @yield('head')
</head>
<body>
    @include('front.partials.header')
    @include('front.partials.breadcrumb')


@section('body')
    <!-- Main Container Starts -->
    <div class="main-container container inner">
        <div class="row">
            <!-- Sidebar Starts -->
            <div class="col-md-3">
                 @include('front.asides.categories')
                 {{-- @include('front.asides.bestsellers') --}}
            </div>
            <!-- Sidebar Ends -->
            <!-- Primary Content Starts -->
            <div class="col-md-9">
					@yield("content")
            </div>
            <!-- Primary Content Ends -->
        </div>
    </div>
<!-- Main Container Ends -->
@show



@include('front.partials.footer')
