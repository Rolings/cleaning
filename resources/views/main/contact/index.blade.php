@extends('layouts.main')
@section('title','Contact')
@section('content')
    <div class="wrapper">
        <!-- Header Start -->
        @include('main.section.header')
        <!-- Header End -->

        <!-- Page Header Start -->
        @include('main.section.breadcrumb',['title'=>'Contact'])
        <!-- Page Header End -->

        <!-- Contact Start -->
        <div class="contact">
            <div class="container-fluid">
                <div class="row">
                    <livewire:top.question />

                    <div class="col-md-6">
                        <div class="contact-form">
                            {{ html()->form()->route('contact.store')->attributes(['id'=>'contact-form'])->open() }}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {{ html()->text('name')->required()->placeholder('Your name')->attributes(['id'=>'name','class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ html()->text('phone')->required()->placeholder('+1 (000) 000 0000')->attributes(['id'=>'phone','class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ html()->textarea('message')->required()->placeholder('Message')->attributes(['id'=>'message','class'=>'form-control','rows'=>6]) }}
                            </div>
                            <div>
                                <button class="btn-global" type="submit">Send Message</button>
                            </div>
                            {{ html()->form()->close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
@vite(['resources/js/library/jquery.mask.js'])
@section('js')
    <script>
        window.onload = () => {
            $('#phone').on('input', () => {
                $(this).val('+1')
            }).on('mousedown', () => {
                $(this).val('+1')
            }).mask('+1 (000) 000 0000');

            $("form#contact-form").on('submit', function (e) {
                e.preventDefault();
                let _this = $(this);
                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: $(this).serializeArray(),
                    success: (response) => {
                        $.toast({
                            heading: 'Success',
                            text: response.message,
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                        _this[0].reset();
                    },
                    error: (error) => {
                        $.toast({
                            heading: 'Error',
                            text: error.message,
                            showHideTransition: 'fade',
                            icon: 'error'
                        })
                    }

                });
            })
        }
    </script>
@endsection
