@extends('layouts.main')
@section('title','Frequently questions')
@section('content')
    <div class="wrapper">
        <!-- Header Start -->
        @include('main.section.header')
        <!-- Header End -->

        <!-- Page Header Start -->
        @include('main.section.breadcrumb',['title'=>'Frequently questions'])
        <!-- Page Header End -->

        <!-- Question Start -->

        <div class="row m-0 p-0">
            <div class="col-12 col-sm-12 m-0 p-0">
                <div class="row m-0 p-0">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 m-0 pl-0 pr-3">
                        <div class="faqs">
                            <div id="accordion">
                                @foreach($items as $item)
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse-{{ $loop->index }}" aria-expanded="false">
                                                {!! $item->question !!}
                                            </a>
                                        </div>
                                        <div id="collapse-{{ $loop->index }}" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                {!! $item->answer !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 m-0 pl-3 pr-0">
                        <div class="row d-flex justify-content-center mb-3">
                            <div class="text-center">
                                <img src="/build/images/main/faq.png" width="200" class="img-fluid" alt="...">
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-12 contact-form">
                                <h3>Ask your questions</h3>
                                {{ html()->form()->route('frequently-questions.store')->attributes(['id'=>'question-form','class'=>'mt-3'])->open() }}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        {{ html()->text('name')->required()->placeholder('Your name')->attributes(['id'=>'name','class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ html()->email('email')->required()->placeholder('Your email')->attributes(['id'=>'email','class'=>'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ html()->textarea('question')->required()->placeholder('Enter your question')->attributes(['id'=>'question','class'=>'form-control','rows'=>6]) }}
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
        </div>
        <!-- Question End -->

        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection

@section('js')
    <script>
        window.onload = () => {
            $("form#question-form").on('submit', function (e) {
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
