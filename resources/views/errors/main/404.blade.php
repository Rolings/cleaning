@extends('layouts.main')
@section('title',$status)
@section('content')
    <div class="wrapper">
        <!-- Header Start -->
{{--        @include('main.section.header')--}}
        <!-- Header End -->

        <!-- Page Header Start -->
        @include('main.section.breadcrumb',['title'=>$status])
        <!-- Page Header End -->


        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
