@extends('layouts.main')
@section('title','EUROFRESH')
@section('content')
    <div class="wrapper">

        <!-- Header Start -->
        @include('main.section.home-header')
        <!-- Header End -->

        <!-- About Start -->
        <div class="about">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="about-img">
                            <img src="{{ $about_image??$no_image }}" alt="About" title="About">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="about-text">

                            <div class="row">
                                <h2>{{ $about_title }}</h2>
                               <p> {!! $about_preview_description !!}</p>
                            </div>
                            <div class="row">
                                <a class="btn-global" href="{{ route('about.index') }}">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
