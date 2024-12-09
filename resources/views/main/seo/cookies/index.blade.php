@extends('layouts.main')
@section('title',$item->title)
@section('content')
    <div class="wrapper">
        <!-- Header Start -->
        @include('main.section.header')
        <!-- Header End -->

        <!-- Page Header Start -->
        @include('main.section.breadcrumb',['title'=>$item->title])
        <!-- Page Header End -->

        <div class="container">
            {!! $item->description !!}
        </div>

        <!-- Footer Start -->
        @include('main.section.footer')
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
