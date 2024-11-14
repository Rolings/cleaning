@extends('layouts.main')
@section('title','Services')
@section('content')
    <div class="wrapper">
        <!-- Header Start -->
        @include('main.section.header')
        <!-- Header End -->

        <!-- Page Header Start -->
        @include('main.section.breadcrumb',['title'=>'Services'])
        <!-- Page Header End -->

        <!-- Service Start -->
        @include('main.services.section.service')
        <!-- Service End -->

        <!-- Feature Start -->
        @include('main.services.section.feature')
        <!-- Feature End -->

        <!-- Pricing Plan Start -->
        @include('main.services.section.price')
        <!-- Pricing Plan End -->

        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
