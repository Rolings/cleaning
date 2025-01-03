@extends('layouts.main')
@section('title','Checkout')
@section('content')
    <div class="wrapper">
        <!-- Header Start -->
        @include('main.section.header')
        <!-- Header End -->

        <!-- Page Header Start -->
        @include('main.section.breadcrumb',['title'=>'Checkout'])
        <!-- Page Header End -->

        <div class="service">

        </div>

        @include('main.section.footer')
        {{--        @include('main.checkout.include.service-modal')--}}

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
