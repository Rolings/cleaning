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
            <div class="container">
                <div class="section-header">
                    <h1>Checkout</h1>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="about-img">
                                <img src="{{ $service->imageUrl }}" alt="About" class="col-12" title="About">
                            </div>
                            <div class="about-text">
                                <div>
                                    <h3>{{ $service->name }}</h3>
                                </div>
                                <div>
                                    {!! $service->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8"></div>
                </div>
            </div>
        </div>


        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
