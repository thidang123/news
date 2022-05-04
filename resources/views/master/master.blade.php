<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @include('master/layouts/head')
    <title>@yield('title')</title>
    @yield('css')
    @stack('css')
   @stack('csslogin')
</head>

<body>

<!-- Preloader Start -->
@include('master/layouts/preload')
<!-- Preloader End -->
{{--Modal Start--}}
{{--Modal End--}}
<!-- ***** Header Area Start ***** -->
@include('master/layouts/header')
@include('list')
<!-- ***** Header Area End ***** -->

<!-- ********** Hero Area Start ********** -->
@include('master/layouts/heroarea')
<!-- ********** Hero Area End ********** -->

<div class="main-content-wrapper section-padding-100">
    <div class="container">
        <div>
            <!-- ============= Post Content Area Start ============= -->
            @yield('main')
        </div>
        <!-- ========== Sidebar Area ========== -->

    </div>
    <div class="row justify-content-center">
        @yield('content')
    </div>
</div>
<!-- ***** Footer Area Start ***** -->
@include('master/layouts/footer')

<!-- ***** Footer Area End ***** -->
<!-- jQuery (Necessary for All JavaScript Plugins) -->
@include('master/layouts/masterjs')

@yield('script')
@yield('js')
@stack('js')
</body>

</html>
