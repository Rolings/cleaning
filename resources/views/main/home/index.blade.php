@extends('layouts.main')
@section('title','EUROFRESH')
@section('content')
    <div class="wrapper">

        <!-- Header Start -->
        @include('main.section.home-header')
        <!-- Header End -->

        <!-- About Start -->
        <livewire:top.about />
        <!-- About End -->

        <!-- Service Start -->
        <livewire:top.service />
        <!-- Service End -->

        <!-- Project Start -->
        <livewire:top.project />
        <!-- Project End -->

        <!-- Team Start -->
        <livewire:top.member />
        <!-- Team End -->

        <!-- FAQs Start -->
        @include('main.home.section.faq')
        <!-- FAQs End

        <!-- Review Start -->
        <livewire:review />
        <!-- Review End -->

        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
@vite(['resources/js/library/jquery.mask.js'])
@section('js')
    <script>
        window.onload = () => {
            $('#phone').mask('+1 (000) 000-0000');
        }
    </script>
@endsection
