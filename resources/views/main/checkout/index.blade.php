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
@vite(['resources/css/library/quantity.css'])
@section('js')

    <script>
        window.onload = () => {
            $('[data-bs-toggle="tooltip"]').tooltip();
            $(document).on('click', ".js-add-services", function () {
                $("#services-list").modal('show');
            });

            const initializeFlatpickr = () => {
                $('[data-bs-toggle="tooltip"]').tooltip();

                flatpickr(document.getElementsByClassName('date-time-picker')[0], {
                    enableTime: true,
                    noCalendar: false,
                    dateFormat: "m/d/Y h:i K",
                    time_24hr: false,
                    minDate: new Date(),
                    minuteIncrement: 30
                });
            }

            document.addEventListener('livewire:load', function () {
                initializeFlatpickr();
            });

            document.addEventListener('livewire:updated', function () {
                initializeFlatpickr();
            });

            document.addEventListener('livewire:initialized', function () {
                initializeFlatpickr();
            });
        }
    </script>
@endsection
