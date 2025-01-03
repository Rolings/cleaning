@extends('layouts.main')
@section('title','Cart')
@section('content')
    <div class="wrapper">
        <!-- Header Start -->
        @include('main.section.header')
        <!-- Header End -->

        <!-- Page Header Start -->
        @include('main.section.breadcrumb',['title'=>'Cart'])
        <!-- Page Header End -->

        <div class="service">
            {{ html()->form()->route('checkout')->open() }}
            <div class="container-fluid">
                <h3>Complete your booking.</h3>
                <livewire:checkout :request-data="$requestData"/>
                <livewire:checkout-modal/>
            </div>
            {{ html()->form()->close() }}
        </div>

        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
@section('js')
    <script>
        window.onload = () => {
            $(document).on('click', ".js-add-services", function () {
                $("#services-list").modal('show');
            });

            flatpickr(document.getElementsByClassName('date-time-picker')[0], {
                enableTime: true,
                noCalendar: false,
                defaultDate: '{{ now()->format('m/d/Y h:i K') }}',
                dateFormat: "m/d/Y h:i K",
                time_24hr: false
            });
        }
    </script>
@endsection
