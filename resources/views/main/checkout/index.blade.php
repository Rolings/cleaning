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
                <livewire:checkout :request-data="$requestData"/>
                <livewire:checkout-modal :blocked-date="$blockedDates"/>
            </div>
            {{ html()->form()->close() }}
        </div>

        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
@vite([
    'resources/css/library/calendar.css',
    'resources/js/library/calendar.js',
])
@section('before_js')
    <script>
        var calendarModal;

        var calendar;

        var defaultDate;

        window.addEventListener('DOMContentLoaded', () => {

            calendarModal = $('#calendar-modal');

            function init() {
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
                $('#phone').mask('+1 (000) 000-0000');

                $('#order_at').on('click', () => calendarModal.modal('show'));
                $('#order_at_picture').on('click', () => calendarModal.modal('show'));

                $(".btn-close").on('click', () => calendarModal.modal('hide'));

            }

            init();

            const observer = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.addedNodes.length > 0) {

                        init();
                    }
                });
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        });

        document.addEventListener('livewire:init', () => {
            Livewire.on('set-default-date', (event) => {
                defaultDate = event.date;
            });
        });
    </script>
@endsection
