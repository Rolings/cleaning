<div class="about">
    <div class="container">
        <div class="section-header">
            <h1>About</h1>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="about-img">
                    <img src="{{ $about_image??$no_image }}" alt="About" title="About">
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="about-text">
                    <h2>{{ $about_title }}</h2>
                    <div>
                        {!! $about_description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
