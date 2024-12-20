<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title','')</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    {{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">--}}

    <!-- App CSS -->
    @vite(['resources/css/admin/portal.css', 'resources/css/library/image-uploader.css','resources/css/library/jquery.multiselect.css'])

    @yield('css')

    @vite([ 'resources/js/library/jquery.js'])
    @livewireStyles
</head>
<body class="app">
@yield('content')
@include('custom_scripts')
@yield('before_js')

@vite([
        'resources/js/library/bootstrap.bundle.js',
        'resources/js/library/popper.js',
        'resources/js/library/jquery.multiselect.js',
        'resources/js/library/image-uploader.js',
        'resources/js/library/tinymce.js',
        'resources/js/admin/main-script.js',
])
@yield('js')
@livewireScripts
</body>
</html>
