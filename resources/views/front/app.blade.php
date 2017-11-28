<!doctype html>
<html lang="es">
<head>
    @include('front.partials.head')
    @yield('head')
</head>
<body>
    @include('front.partials.header')

@section('body')
	@include('front.partials.breadcrumb')
    <!-- Main Container Starts -->
    <div class="main-container container inner">
        <div class="row">
			@section('left-bar')
				<!-- Sidebar Starts -->
				<div class="col-md-3">
					@include('front.asides.categories')
					{{-- @include('front.asides.bestsellers') --}}
				</div>
				<!-- Sidebar Ends -->
			@show
            <!-- Primary Content Starts -->
            <div class="col-md-@yield("col", 9)">
					@yield("content")
            </div>
            <!-- Primary Content Ends -->
        </div>
    </div>
<!-- Main Container Ends -->
@show


@include('front.partials.footer')
