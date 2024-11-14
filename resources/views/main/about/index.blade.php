@extends('layouts.main')
@section('title','About')
@section('content')
    <div class="wrapper">
        <!-- Header Start -->
        @include('main.section.header')
        <!-- Header End -->

        <!-- Page Header Start -->
        @include('main.section.breadcrumb',['title'=>'About'])
        <!-- Page Header End -->

        <!-- About Start -->
        @include('main.about.section.description')
        <!-- About End -->

        <!-- Story Start -->
        @include('main.about.section.story')
        <!-- Story End -->

        <!-- Team Start -->
        @include('main.about.section.team')
        <!-- Team End -->

        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
