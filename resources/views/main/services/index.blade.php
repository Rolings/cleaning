@extends('layouts.main')
@section('title','Our services')
@section('content')
    <div class="wrapper">
        <!-- Header Start -->
        @include('main.section.header')
        <!-- Header End -->

        <!-- Page Header Start -->
        @include('main.section.breadcrumb',['title'=>'Services'])
        <!-- Page Header End -->

        <!-- Service Start -->

        <div class="service">
            <div class="container-fluid ml-sm-2 mr-sm-2 ml-md-2 mr-md-2  ml-lg-2 mr-lg-2 ml-xl-0 mr-xl-0">
                <div class="row mb-3">
                    @foreach ($services as $service)
                        <div class="item-shadow col-lg-4 col-md-6 mb-5">
                            <div class="service-item">
                                <div class="services-image">
                                    <a href="{{ route('services.show', $service->slug) }}">
                                        <img src="{{ $service->imageUrl }}" alt="Service">
                                    </a>
                                </div>
                                <div class="services-text">
                                    <div class="services-title">
                                        <h3 class="title">
                                            <a href="{{ route('services.show', $service->slug) }}">{{ $service->name }}</a>
                                        </h3>
                                    </div>
                                    <p>{!! $service->limitDescription !!}</p>
                                    <div class="service-link">
                                        <a href="{{ route('services.show', $service->slug) }}">
                                            Read more
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 12h14m0 0-6-6m6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    {{ $services->links('main.section.pagination') }}
                </div>
            </div>
        </div>
        {{--<div class="service">
            <div class="container-fluid p-0">
                <div class="row mb-3">
                    @foreach ($services as $service)
                        <div class="item-shadow col-lg-4 col-md-6 mb-5">
                            <div class="service-item">
                                <div class="services-image">
                                    <img src="{{ $service->imageUrl }}" width="100" alt="Service">
                                </div>
                                <div class="services-text">
                                    <div class="services-title">
                                        <h3 class="title"><a href="{{ route('services.show',$service->slug) }}">{{ $service->name }}</a></h3>
                                    </div>
                                    <div class="service-link">
                                        <a href="{{ route('services.show',$service->slug) }}">Read more-></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    {{ $services->links('main.section.pagination') }}
                </div>
            </div>
        </div>--}}
        <!-- Service End -->

        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
