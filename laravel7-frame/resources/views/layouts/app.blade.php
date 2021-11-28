<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('images/logos/fav.png') }}">
    @yield('head')
</head>
<body>

@guest
    @yield("content")
@else
    <section class="main container-fluid">
        <div class="row">
            <!--        sidebar start-->
        @include("layouts.sidebar")
        <!--        sidebar end-->
            <div class="col-12 col-lg-9 col-xl-10 vh-100 py-3 content">
            @include("layouts.header")
            <!--content Area Start-->
            @yield("content")
            <!--content Area Start-->
            </div>
        </div>
    </section>
@endguest


<script src="{{ asset('js/app.js') }}"></script>
@yield('foot')
</body>
</html>
