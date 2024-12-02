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
            <div class="container">
                <div class="section-header">
                    <p>Contact Us</p>
                    <h2>Find Your Answer / Send Message</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="faqs">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                            <span>1</span> Lorem ipsum dolor sit amet?
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseTwo">
                                            <span>2</span> Lorem ipsum dolor sit amet?
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseThree">
                                            <span>3</span> Lorem ipsum dolor sit amet?
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseFour">
                                            <span>4</span> Lorem ipsum dolor sit amet?
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseFour">
                                            <span>5</span> Lorem ipsum dolor sit amet?
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <button class="btn" type="submit">Send Message</button>
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
