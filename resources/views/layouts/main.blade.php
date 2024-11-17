<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title','')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Cleaning Company Website Template" name="keywords">
    <meta content="Cleaning Company Website Template" name="description">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link href="build/images/main/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- CSS Libraries -->
    @vite([
/*        'resources/css/library/bootstrap/bootstrap.css',*/
        'resources/css/library/lightbox/lightbox.css',
        'resources/css/library/owlcarousel/owl.carousel.css',
        'resources/css/main/main-style.css',
    ])

    <!-- JavaScript Libraries -->
    @vite([ 'resources/js/library/jquery.js'])

    @livewireStyles
</head>
<body>
@yield('content')
@include('custom_scripts')
@yield('js')
    @vite([
        'resources/js/library/bootstrap.js',
        'resources/js/library/easing.js',
        'resources/js/library/isotope-layout.js',
        'resources/js/library/lightbox.js',
    ])
    @vite(['resources/js/main/main-script.js'])
@livewireScripts
</body>
</html>
