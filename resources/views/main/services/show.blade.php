@extends('layouts.main')
@section('title',$service->title)
@section('content')
    <div class="wrapper">
        <!-- Header Start -->
        @include('main.section.header')
        <!-- Header End -->

        <!-- Page Header Start -->
        @include('main.section.breadcrumb',['breadcrumbs'=>[
                ['route'=>'services.index','title'=>'Our services'],
                ['title'=>$service->title]]
                ])
        <!-- Page Header End -->

        <!-- Single Page Start -->
        <div class="single">
            <div class="container">
                <div class="section-header">
                    <h2>{{ $service->title }}</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>
                            {{ $service->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Page End -->

        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
