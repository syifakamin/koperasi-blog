<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('assets/frontend/images/favicon.png')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <!-- Font -->

  	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


  	<!-- Stylesheets -->
     <link href="{{ asset('assets/frontend/css/swiper.css')}}" rel="stylesheet"> 

  	 <link href="{{ asset('assets/frontend/css/bootstrap.css')}}" rel="stylesheet"> 

  	 <link href="{{ asset('assets/frontend/css/ionicons.css')}}" rel="stylesheet"> 

    @stack('css')
    
</head>
<body>

    @include('layouts.frontend.partial.header')

    @yield('content')

    @include('layouts.frontend.partial.footer')

    <!-- SCIPTS -->

  	<script src="{{ asset('assets/frontend/js/jquery-3.1.1.min.js')}}"></script>

  	<script src="{{ asset('assets/frontend/js/tether.min.js')}}"></script>

  	<script src="{{ asset('assets/frontend/js/bootstrap.js')}}"></script>

    <script src="{{ asset('assets/frontend/js/home/scripts.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/home/swiper.js')}}"></script>

    @stack('js')

</body>
</html>
