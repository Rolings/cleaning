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
            {{ html()->form()->route('checkout')->open() }}
            <div class="container-fluid">
                <h3>Complete your booking.</h3>
                <livewire:checkout :request-data="$requestData"/>
            </div>
            {{ html()->form()->close() }}
        </div>

        @include('main.section.footer')
        @include('main.checkout.include.service-modal')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
@section('js')
    <script>
        window.onload = () => {
            $(document).on('click', ".js-add-services", function () {
                console.log('12312')
                $("#services-list").modal('show');
            });
        }
    </script>
@endsection
