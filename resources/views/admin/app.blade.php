<!DOCTYPE html>
<html lang="es-ar">
    <head>
        @include('admin.partials.head')
        @yield('head')
    </head>
    <body>
        @include('admin.partials.header')
        @include('admin.partials.nav')

        @yield('content')

        @include('admin.partials.footer')
        @include('admin.partials.scripts')
    </body>
</html>