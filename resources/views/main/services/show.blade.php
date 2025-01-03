@extends('layouts.main')
@section('title',$service->name)
@section('content')
    <div class="wrapper">
        <!-- Header Start -->
        @include('main.section.header')
        <!-- Header End -->

        <!-- Page Header Start -->
        @include('main.section.breadcrumb',['title'=>$service->name,'breadcrumbs'=>[
                ['route'=>'services.index','title'=>'Our services'],
                ['title'=>$service->name]]
                ])
        <!-- Page Header End -->

        <!-- Single Page Start -->
        <div class="single">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="about-text">
                            <div>
                                {!! $service->description !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <a class="btn-global" href="{{ route('checkout',$service) }}">Checkout now</a>
                </div>
            </div>
        </div>
        <!-- Single Page End -->

        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
