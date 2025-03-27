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
        <div class="about">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="about-img">
                            <img src="{{ $about_image??$no_image }}" alt="About" title="About">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="about-text">


                            <div class="row">
                                <h2>{{ $about_title }}</h2>
                                {!! $about_description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About End -->

        <!-- Story Start -->
        <div class="story">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="story-container">
                            <div class="story-end">
                                <p>Now</p>
                            </div>
                            <div class="story-continue">
                                @foreach($history->forget($history->count()-1) as $item)

                                    @if(($loop->index+1) % 2 == 0)
                                        <div class="row story-left">
                                            <div class="col-md-6 d-md-none d-block">
                                                <p class="story-date">
                                                    {{ $item->event_date_at->format('d F Y') }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="story-box">
                                                    <div class="story-text">
                                                        <h3>{{ $item->name }}</h3>
                                                        <p>
                                                            {!! $item->description !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-md-block d-none">
                                                <p class="story-date">
                                                    {{ $item->event_date_at->format('d F Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row story-right">
                                            <div class="col-md-6">
                                                <p class="story-date">
                                                    {{ $item->event_date_at->format('d F Y') }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="story-box">
                                                    <div class="story-text">
                                                        <h3>{{ $item->name }}</h3>
                                                        <p>
                                                            {{ $item->description }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                            <div class="story-start">
                                <p>Launch</p>
                            </div>
                            <div class="story-launch">
                                <div class="story-box">
                                    <div class="story-text">
                                        <h3>{{ $history->last()->name }}</h3>
                                        <p>
                                            {{ $history->last()->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Story End -->

        <!-- Team Start -->
        <livewire:top.member />
        <!-- Team End -->

        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
