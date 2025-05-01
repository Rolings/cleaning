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
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-jscalendar@1.4.5/source/jsCalendar.min.css" rel="stylesheet">
@endsection
@section('before_js')
    <script src="https://cdn.jsdelivr.net/npm/simple-jscalendar@1.4.5/source/jsCalendar.min.js"></script>
    <script>
        window.onload = () => {
            $(document).on('click', ".js-add-services", function () {
                $("#services-list").modal('show');
            });

            const initializeFlatpickr = () => {
                $(document).ready(function(){
                    $(".date-time-picker").simpleCalendar();
                });
      /*          flatpickr(document.getElementsByClassName('date-time-picker')[0], {
                    enableTime: true,
                    noCalendar: false,
                    dateFormat: "m/d/Y h:i K",
                    time_24hr: false,
                    minDate: new Date(),
                    minuteIncrement: 30
                });*/
            }


            document.addEventListener('livewire:load', function () {
              //  initializeFlatpickr();
            });

            document.addEventListener('livewire:updated', function () {
               // initializeFlatpickr();
            });

            document.addEventListener('livewire:initialized', function () {
              //  initializeFlatpickr();
            });
        }

        window.addEventListener('DOMContentLoaded', () => {

            const initializeFlatpickr = () => {
                $(document).ready(function(){
                    $(".date-time-picker").simpleCalendar();
                });
 /*               flatpickr(document.getElementsByClassName('date-time-picker')[0], {
                    enableTime: false,
                    noCalendar: false,
                    dateFormat: "m/d/Y",
                    time_24hr: false,
                    minDate: new Date(),
                    minuteIncrement: 30
                });*/
            }

            function initTooltips() {

                $('.custom-tooltip').each(function () {
                    const $el = $(this);
                    if ($el.data('bs.tooltip')) return;

                    const tooltipText = $el.find('.tooltip-text').text().trim();
                    if (tooltipText) {
                        $el.tooltip({
                            title: tooltipText
                        });
                    }
                });
            }

            initTooltips();
            initializeFlatpickr();

            const observer = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.addedNodes.length > 0) {
                        initTooltips();
                    }
                });
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        });
    </script>
@endsection
