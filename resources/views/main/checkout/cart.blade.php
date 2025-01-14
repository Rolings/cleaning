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
            <h3>Your order has been successfully created.</h3>
        </div>

        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
