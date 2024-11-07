@extends('layouts.main')
@section('title','Services')
@section('content')
    <div class="wrapper">
        <!-- Header Start -->
        @include('main.section.header')
        <!-- Header End -->


        <!-- Page Header Start -->
        @include('main.section.breadcrumb',['title'=>'Services'])
        <!-- Page Header End -->


        <!-- Service Start -->
        <div class="service">
            <div class="container">
                <div class="section-header">
                    <p>Our Services</p>
                    <h2>Provide Services Worldwide</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <img src="build/images/main/service-1.jpg" alt="Service">
                            <h3>Flour Cleaning</h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare
                            </p>
                            <a class="btn" href="">Learn More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <img src="build/images/main/service-2.jpg" alt="Service">
                            <h3>Glass Cleaning</h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare
                            </p>
                            <a class="btn" href="">Learn More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <img src="build/images/main/service-3.jpg" alt="Service">
                            <h3>Carpet Cleaning</h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare
                            </p>
                            <a class="btn" href="">Learn More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <img src="build/images/main/service-4.jpg" alt="Service">
                            <h3>Toilet Cleaning</h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare
                            </p>
                            <a class="btn" href="">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


        <!-- Feature Start -->
        <div class="feature">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="section-header left">
                            <p>Why Choose Us</p>
                            <h2>Expert Cleaners and World Class Services</h2>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl
                            nec nisi scelerisque maximus. Aenean consectetur convallis porttitor. Aliquam interdum at lacus non blandit.
                        </p>
                        <a class="btn" href="">Learn More</a>
                    </div>
                    <div class="col-md-7">
                        <div class="row align-items-center feature-item">
                            <div class="col-5">
                                <img src="build/images/main/feature-1.jpg" alt="Feature">
                            </div>
                            <div class="col-7">
                                <h3>Expert Cleaners</h3>
                                <p>
                                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate.
                                </p>
                            </div>
                        </div>
                        <div class="row align-items-center feature-item">
                            <div class="col-5">
                                <img src="build/images/main/feature-2.jpg" alt="Feature">
                            </div>
                            <div class="col-7">
                                <h3>Reasonable Prices</h3>
                                <p>
                                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate.
                                </p>
                            </div>
                        </div>
                        <div class="row align-items-center feature-item">
                            <div class="col-5">
                                <img src="build/images/main/feature-3.jpg" alt="Feature">
                            </div>
                            <div class="col-7">
                                <h3>Quick & Best Services</h3>
                                <p>
                                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End -->


        <!-- Pricing Plan Start -->
        <div class="price">
            <div class="container">
                <div class="section-header">
                    <p>Pricing Plan</p>
                    <h2>No Extra Hidden Charges</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="price-item">
                            <div class="price-header">
                                <div class="price-icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="price-title">
                                    <h2>Standard</h2>
                                </div>
                                <div class="price-pricing">
                                    <h2><small>$</small>99</h2>
                                </div>
                            </div>
                            <div class="price-body">
                                <div class="price-des">
                                    <ul>
                                        <li>3 Bedrooms cleaning</li>
                                        <li>2 Bathrooms cleaning</li>
                                        <li>1 Living room Cleaning</li>
                                        <li>Vacuum Cleaning</li>
                                        <li>Within 6 Hours</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="price-footer">
                                <div class="price-action">
                                    <a href=""><i class="fa fa-shopping-cart"></i>Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="price-item featured-item">
                            <div class="price-header">
                                <div class="price-icon">
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price-title">
                                    <h2>Premium</h2>
                                </div>
                                <div class="price-pricing">
                                    <h2><small>$</small>149</h2>
                                </div>
                            </div>
                            <div class="price-body">
                                <div class="price-des">
                                    <ul>
                                        <li>5 Bedrooms cleaning</li>
                                        <li>3 Bathrooms cleaning</li>
                                        <li>2 Living room Cleaning</li>
                                        <li>Vacuum Cleaning</li>
                                        <li>Within 6 Hours</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="price-footer">
                                <div class="price-action">
                                    <a href=""><i class="fa fa-shopping-cart"></i>Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="price-item">
                            <div class="price-header">
                                <div class="price-icon">
                                    <i class="fa fa-gift"></i>
                                </div>
                                <div class="price-title">
                                    <h2>Enterprise</h2>
                                </div>
                                <div class="price-pricing">
                                    <h2><small>$</small>199</h2>
                                </div>
                            </div>
                            <div class="price-body">
                                <div class="price-des">
                                    <ul>
                                        <li>8 Bedrooms cleaning</li>
                                        <li>5 Bathrooms cleaning</li>
                                        <li>3 Living room Cleaning</li>
                                        <li>Vacuum Cleaning</li>
                                        <li>Within 12 Hours</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="price-footer">
                                <div class="price-action">
                                    <a href=""><i class="fa fa-shopping-cart"></i>Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pricing Plan End -->


        @include('main.section.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
@endsection
