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
                    <h2>{{ $about_title }}</h2>
                    <div>
                        {!! $about_limit_description !!}
                    </div>

                    <a class="btn" href="{{ route('about.index') }}">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>
