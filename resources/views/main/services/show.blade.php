@extends('layouts.main')
@section('title',$service->name)
@section('content')
    <div class="wrapper">
        <!-- Header Start -->
        @include('main.section.header')
        <!-- Header End -->

        <!-- Page Header Start -->
        @include('main.section.breadcrumb',['title'=>$service->name,'breadcrumbs'=>[
                ['route'=>'services.index','title'=>'Our services'],
                ['title'=>$service->name]]
                ])
        <!-- Page Header End -->


        <!-- Single Page Start -->

        <section class="post-content-area single-post-area">
            <div class=" ml-sm-2 mr-sm-2 ml-md-2 mr-md-2  ml-lg-2 mr-lg-2 ml-xl-0 mr-xl-0">
                <div class="row">
                    <div class="col-lg-4 sidebar-widgets">
                        <div class="widget-wrap">
                            <div class="single-sidebar-widget user-info-widget">
                                <img class="img-fluid d-flex justify-content-center" src="{{ $service->imageUrl }}" alt="">
                            </div>
                            <div class="single-sidebar-widget popular-post-widget mt-3">
                                <h4 class="popular-title">Top Projects</h4>
                                <div class="popular-post-list">

                                    @foreach($projects as $project)
                                        <div class="single-post-list d-flex flex-row align-items-center">
                                            <div class="thumb mr-3 mt-3 mb-3">
                                                <img class="img-fluid" width="70" src="{{ $project->image() }}" alt="">
                                            </div>
                                            <div class="details">
                                                <p>{{ $project->name }}</p>
                                                <h6>02 Hours ago</h6>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 posts-list">
                        <div class="single-post row">
                            <div class="col-lg-12 col-md-12">
                                {!! $service->description !!}
                            </div>
                        </div>

                        <div class="navigation-area mt-5">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-end">
                                    @if($previousService)
                                    <div class="thumb">
                                        <a href="{{ route('services.show', $previousService) }}"><img class="img-fluid" width="100" src="{{ $previousService->imageUrl }}" alt=""></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="{{ route('services.show', $previousService) }}"><span class="lnr text-white lnr-arrow-left"></span></a>
                                    </div>
                                    <div class="detials">
                                        <p>Prev Post</p>
                                        <a href="{{ route('services.show', $previousService) }}"><p>{{ $previousService->name }}</p></a>
                                    </div>
                                    @endif
                                </div>


                                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    @if($nextService)
                                    <div class="detials">
                                        <p>Next Post</p>
                                        <a href="{{ route('services.show', $nextService) }}"><p>{{ $nextService->name }}</p></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="{{ route('services.show', $nextService) }}"><span class="lnr text-white lnr-arrow-right"></span></a>
                                    </div>
                                    <div class="thumb">
                                        <a href="{{ route('services.show', $nextService) }}"><img class="img-fluid" width="100" src="{{ $nextService->imageUrl }}" alt=""></a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="comment-form mt-5">
                            <h4>Leave a Comment</h4>
                            {{ html()->form()->route('checkout')->open() }}
                            {{ html()->hidden('') }}
                                <div class="container-fluid mr-0 pr-0">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 m-0 p-0">
                                            <div class="form-group">
                                                {{ html()->text('name')->required()->placeholder('Your Name')->attributes(['id'=>'name','class'=>'form-control']) }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                            <div class="form-group">
                                                {{ html()->text('phone')->required()->placeholder('Mobile Number')->attributes(['id'=>'phone','class'=>'form-control']) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 m-0 pl-0">
                                            <div class="form-group">
                                                {{ html()->text('subject')->required()->placeholder('Subject')->attributes(['id'=>'subject','class'=>'form-control']) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 m-0 pl-0">
                                            <div class="form-group">
                                                {{ html()->textarea('comment')->placeholder('comment')->attributes(['id'=>'comment','class'=>'form-control','cols'=>'100','rows'=>'30','style'=>'height:100px;']) }}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            {{ html()->form()->close() }}
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Single Page End -->

        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
@section('css')
    <style>

        .single-post-area {
            padding-top: 80px;
            padding-bottom: 80px;
        }

        .single-post-area .meta-details {
            margin-top: 20px !important;
        }

        .single-post-area .social-links li {
            display: inline-block;
            margin-bottom: 10px;
        }

        .single-post-area .social-links li a {
            color: #222;
            padding: 7px;
            font-size: 14px;
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .single-post-area .social-links li a:hover {
            color: #f8b600;
        }

        .single-post-area .quotes {
            margin-top: 20px;
            padding: 30px;
            background-color: white;
            box-shadow: -20.84px 21.58px 30px 0px rgba(176, 176, 176, 0.1);
        }

        .single-post-area .arrow {
            position: absolute;
        }

        .single-post-area .arrow .lnr {
            font-size: 20px;
            font-weight: 600;
        }

        .single-post-area .thumb .overlay-bg {
            background: rgba(0, 0, 0, 0.8);
        }

        .single-post-area .navigation-area {
            border-top: 1px solid #eee;
            padding-top: 30px;
        }

        .single-post-area .navigation-area .nav-left {
            text-align: left;
        }

        .single-post-area .navigation-area .nav-left .thumb {
            margin-right: 20px;
            background: #000;
        }

        .single-post-area .navigation-area .nav-left .thumb img {
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .single-post-area .navigation-area .nav-left .lnr {
            margin-left: 20px;
            opacity: 0;
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .single-post-area .navigation-area .nav-left:hover .lnr {
            opacity: 1;
        }

        .single-post-area .navigation-area .nav-left:hover .thumb img {
            opacity: .5;
        }

        @media (max-width: 767px) {
            .single-post-area .navigation-area .nav-left {
                margin-bottom: 30px;
            }
        }

        .single-post-area .navigation-area .nav-right {
            text-align: right;
        }

        .single-post-area .navigation-area .nav-right .thumb {
            margin-left: 20px;
            background: #000;
        }

        .single-post-area .navigation-area .nav-right .thumb img {
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .single-post-area .navigation-area .nav-right .lnr {
            margin-right: 20px;
            opacity: 0;
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .single-post-area .navigation-area .nav-right:hover .lnr {
            opacity: 1;
        }

        .single-post-area .navigation-area .nav-right:hover .thumb img {
            opacity: .5;
        }

        @media (max-width: 991px) {
            .single-post-area .sidebar-widgets {
                padding-bottom: 0px;
            }
        }


        .post-content-area {
            background-color: #ffffff;
        }

        .post-content-area .single-post {
            margin-bottom: 50px;
        }

        .post-content-area .single-post .meta-details {
            text-align: right;
            margin-top: 35px;
        }

        @media (max-width: 767px) {
            .post-content-area .single-post .meta-details {
                text-align: left;
            }
        }

        .post-content-area .single-post .meta-details .tags {
            margin-bottom: 30px;
        }

        .post-content-area .single-post .meta-details .tags li {
            display: inline-block;
            font-size: 14px;
        }

        .post-content-area .single-post .meta-details .tags li a {
            color: #222;
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .post-content-area .single-post .meta-details .tags li a:hover {
            color: #f8b600;
        }

        @media (max-width: 1024px) {
            .post-content-area .single-post .meta-details {
                margin-top: 0px;
            }
        }

        .post-content-area .single-post .user-name a,
        .post-content-area .single-post .date a,
        .post-content-area .single-post .view a,
        .post-content-area .single-post .comments a {
            color: #777777;
            margin-right: 10px;
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .post-content-area .single-post .user-name a:hover,
        .post-content-area .single-post .date a:hover,
        .post-content-area .single-post .view a:hover,
        .post-content-area .single-post .comments a:hover {
            color: #f8b600;
        }

        .post-content-area .single-post .user-name .lnr,
        .post-content-area .single-post .date .lnr,
        .post-content-area .single-post .view .lnr,
        .post-content-area .single-post .comments .lnr {
            font-weight: 900;
            color: #222;
        }

        .post-content-area .single-post .feature-img {
            max-height: 200px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .post-content-area .single-post .feature-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .post-content-area .single-post .posts-title h3 {
            margin: 20px 0px;
        }

        .post-content-area .single-post .excert {
            margin-bottom: 20px;
        }

        .post-content-area .single-post .primary-btn {
            background: #fff !important;
            color: #222 !important;
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
            border-radius: 0px !important;
        }

        .post-content-area .single-post .primary-btn:hover {
            background: #f8b600 !important;
            color: #fff !important;
        }

        .sidebar-widgets {
            padding-bottom: 120px;
        }

    </style>

@endsection
