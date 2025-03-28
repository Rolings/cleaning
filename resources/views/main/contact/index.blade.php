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
        <div class="row m-0 p-0">
            <div class="col-12 col-sm-12 m-0 p-0">
                <div class="row m-0 p-0">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d91323.54137276571!2d-76.19217719163946!3d36.822655049314896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sru!2s!4v1742122570223!5m2!1sru!2s" width="1366" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="row m-0 p-0 mt-5">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 m-0 pl-0 pr-3">

                        <div class="m-3 p-4 shadow-sm img-rounded">
                            @if(!empty($contact_address))
                                <p class="m-0"><i class="fa fa-map-marker-alt mr-3"></i>{{ $contact_address }}</p>
                            @endif
                        </div>
                        <div class="m-3 p-4 shadow-sm img-rounded">
                            @if(!empty($contact_phone))
                                <p class="m-0"><i class="fa fa-phone-alt mr-3"></i> <a href="tel:{{ $contact_phone }}">{{ $contact_phone }}</a></p>
                            @endif
                        </div>
                        <div class="m-3 p-4 shadow-sm img-rounded">
                            @if(!empty($contact_email))
                                <p class="m-0"><i class="fa fa-envelope mr-3"></i><a href="mailto:{{ $contact_email }}">{{ $contact_email }}</a></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 m-0 pl-3 pr-0">
                        <div class="contact-form">
                            <h3>Get in touch with us</h3>
                            {{ html()->form()->route('contact.store')->attributes(['id'=>'contact-form','class'=>'mt-3'])->open() }}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {{ html()->text('name')->required()->placeholder('Your name')->attributes(['id'=>'name','class'=>'form-control input']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ html()->text('phone')->required()->placeholder('Your phone')->attributes(['id'=>'phone','class'=>'form-control input']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ html()->textarea('message')->required()->placeholder('Enter your message')->attributes(['id'=>'message','class'=>'form-control input','rows'=>6]) }}
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
                            heading: '',
                            text: response.message,
                            showHideTransition: 'slide',
                            position: 'top-center',
                            bgColor: '#127eb5',
                            textColor: '#eeeeee',
                            hideAfter:5000,
                            icon: 'success'
                        })
                        _this[0].reset();
                    },
                    error: (error) => {
                        $.toast({
                            heading: '',
                            text: error.responseJSON.message,
                            showHideTransition: 'fade',
                            position: 'top-center',
                            bgColor: '#e4691e',
                            textColor: '#eeeeee',
                            hideAfter:5000,
                            icon: 'error'
                        })
                    }

                });
            });
        }
    </script>
@endsection
