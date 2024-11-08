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
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="about-img">
                            <img src="build/images/main/about.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="about-text">
                            <h2><span>10</span> Years Experience</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. Aenean consectetur convallis porttitor. Aliquam interdum at lacus non blandit.
                            </p>
                            <a class="btn" href="">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Story Start -->
        <div class="story">
            <div class="container">
                <div class="section-header">
                    <p>Company Story</p>
                    <h2>Learn About Our Journey</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="story-container">
                            <div class="story-end">
                                <p>Now</p>
                            </div>
                            <div class="story-continue">

                                <div class="row story-right">
                                    <div class="col-md-6">
                                        <p class="story-date">
                                            01 Dec 2020
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="story-box">
                                            <div class="story-text">
                                                <h3>Lorem ipsum dolor</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet elit. Proin euismod nibh in convallis. Nam vitae posuere tortor, et imperdiet nunc. Praesent nisl nulla, fringilla eu ornare, dignissim vitae ipsum.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row story-left">
                                    <div class="col-md-6 d-md-none d-block">
                                        <p class="story-date">
                                            01 Jun 2020
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="story-box">
                                            <div class="story-text">
                                                <h3>Lorem ipsum dolor</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet elit. Proin euismod nibh in convallis. Nam vitae posuere tortor, et imperdiet nunc. Praesent nisl nulla, fringilla eu ornare, dignissim vitae ipsum.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-md-block d-none">
                                        <p class="story-date">
                                            01 Jun 2020
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="story-year">
                                            <p>2020</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row story-right">
                                    <div class="col-md-6">
                                        <p class="story-date">
                                            01 Dec 2019
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="story-box">
                                            <div class="story-text">
                                                <h3>Lorem ipsum dolor</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet elit. Proin euismod nibh in convallis. Nam vitae posuere tortor, et imperdiet nunc. Praesent nisl nulla, fringilla eu ornare, dignissim vitae ipsum.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row story-left">
                                    <div class="col-md-6 d-md-none d-block">
                                        <p class="story-date">
                                            01 Jun  2019
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="story-box">
                                            <div class="story-text">
                                                <h3>Lorem ipsum dolor</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet elit. Proin euismod nibh in convallis. Nam vitae posuere tortor, et imperdiet nunc. Praesent nisl nulla, fringilla eu ornare, dignissim vitae ipsum.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-md-block d-none">
                                        <p class="story-date">
                                            01 Jun  2019
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="story-year">
                                            <p>2019</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row story-right">
                                    <div class="col-md-6">
                                        <p class="story-date">
                                            01 Dec 2018
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="story-box">
                                            <div class="story-text">
                                                <h3>Lorem ipsum dolor</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet elit. Proin euismod nibh in convallis. Nam vitae posuere tortor, et imperdiet nunc. Praesent nisl nulla, fringilla eu ornare, dignissim vitae ipsum.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row story-left">
                                    <div class="col-md-6 d-md-none d-block">
                                        <p class="story-date">
                                            01 Jun 2018
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="story-box">
                                            <div class="story-text">
                                                <h3>Lorem ipsum dolor</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet elit. Proin euismod nibh in convallis. Nam vitae posuere tortor, et imperdiet nunc. Praesent nisl nulla, fringilla eu ornare, dignissim vitae ipsum.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-md-block d-none">
                                        <p class="story-date">
                                            01 Jun 2018
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="story-start">
                                <p>Launch</p>
                            </div>
                            <div class="story-launch">
                                <div class="story-box">
                                    <div class="story-text">
                                        <h3>Launched our company on 01 Jan 2018</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet elit. Proin euismod nibh in convallis. Nam vitae posuere tortor, et imperdiet nunc. Praesent nisl nulla, fringilla eu ornare, dignissim vitae ipsum.
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
        <div class="team">
            <div class="container">
                <div class="section-header">
                    <p>Team Member</p>
                    <h2>Meet Our Expert Cleaners</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="build/images/main/team-1.jpg" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Dylan Adams</h2>
                                <h3>Developer</h3>
                                <div class="team-social">
                                    <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="build/images/main/team-2.jpg" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Dylan Adams</h2>
                                <h3>Developer</h3>
                                <div class="team-social">
                                    <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="build/images/main/team-3.jpg" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Dylan Adams</h2>
                                <h3>Developer</h3>
                                <div class="team-social">
                                    <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="build/images/main/team-4.jpg" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Dylan Adams</h2>
                                <h3>Developer</h3>
                                <div class="team-social">
                                    <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->


        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
