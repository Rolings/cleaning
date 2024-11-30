@extends('layouts.main')
@section('title','EUROFRESH')
@section('content')
    <div class="wrapper">

        <!-- Header Start -->
        @include('main.section.home-header')
        <!-- Header End -->

        <!-- About Start -->
        @include('main.home.section.about')
        <!-- About End -->

        <!-- Service Start -->
        @include('main.home.section.service')
        <!-- Service End -->

        <!-- Feature Start -->
        @include('main.home.section.feature')
        <!-- Feature End -->

        <!-- Team Start -->
        @include('main.home.section.team')
        <!-- Team End -->

        <!-- FAQs Start -->
        @include('main.home.section.faq')
        <!-- FAQs End -->

        <!-- Pricing Plan Start -->
{{--        @include('main.home.section.price')--}}
        <!-- Pricing Plan End -->

        <!-- Testimonial Start -->
{{--        @include('main.home.section.testimonial')--}}
        <!-- Testimonial End -->

        <!-- Call to Action Start -->
{{--        <div class="call-to-action">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <h2>Get A Free Cleaning Service</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        </p>
                    </div>
                    <div class="col-md-3">
                        <a class="btn" href="https://htmlcodex.com/contact">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>--}}
        <!-- Call to Action End -->

        <!-- Blog Start -->
{{--        @include('main.home.section.blog')--}}
        <!-- Blog End -->

        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
