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
        <livewire:about />
        <!-- About End -->

        <!-- Story Start -->
        <livewire:history />
        <!-- Story End -->

        <!-- Team Start -->
        <livewire:top.member />
        <!-- Team End -->

        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
