<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','')</title>
    <meta property="og:title" content="@yield('title','')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="canonical" href="{{ canonicaUrl() }}">

    @if(isRobotIndex())
        <meta name="robots" content="index, follow">
    @endif

    <meta name="description" content="{{ getDescription() }}">
    <meta name="keywords" content="{{ getKeywords() }}">

    <meta property="og:description" content="{{ getDescription() }}">
    <meta property="og:image" content="https://www.example.com/image.jpg">
    <meta property="og:url" content="{{ canonicaUrl() }}">

    <!-- Favicon -->
    <link rel="shortcut icon"  href="/favicon.ico">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- CSS Libraries -->
    @vite([
        'resources/css/library/lightbox.css',
        'resources/css/library/owl.carousel.css',
        'resources/css/library/query.toast.css',
        'resources/css/library/select2.css',
        'resources/css/library/quantity.css',

        'resources/css/main/main-style.css',
    ])
    @yield('css')

    <!-- JavaScript Libraries -->
    @vite([ 'resources/js/library/jquery.js'])

    @livewireStyles
</head>
<body>
@yield('content')
@include('custom_scripts')
@yield('before_js')
@vite([
    'resources/js/library/bootstrap.js',
    'resources/js/library/lightbox.js',
    'resources/js/library/jquery.toast.js',
    'resources/js/library/owl.carousel.js',
    'resources/js/library/select2.js',
    'resources/js/library/jquery.mask.js',
    'resources/js/main/main-script.js',
])
@livewireScripts
@yield('js')

</body>
</html>
