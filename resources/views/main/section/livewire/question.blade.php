{{--<div class="col-md-6">
    <div class="row">
        @foreach($items as $item)


            <div class="card text-center">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>



--}}{{--            <div class="app-card app-card-notification shadow-sm mb-4">
                <div class="app-card-header px-4 py-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-auto text-center text-lg-start">
                            <h4 class="notification-title mb-1">{{ $item->question }}</h4>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//app-card-header-->
                <div class="app-card-body p-4">
                    <div class="notification-content"> {{ $item->answer }}</div>
                </div><!--//app-card-body-->
            </div>--}}{{--
        @endforeach
    </div>
</div>--}}


<div class="testimonial">
    <div class="container">
        <div class="section-header">
            <p>Client Review</p>
        </div>
        <div class="">
            @foreach($items as $item)
                <div class="testimonial-item">
                    <div class="testimonial-img">
                        <img src="build/images/main/testimonial-1.jpg" alt="">
                    </div>
                    <div class="testimonial-content">
                        <h3>{{ $item->name }}</h3>
                        <h4>Profession</h4>
                        <p>{{ $item->comment }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

