<div class="testimonial">
    <div class="container">
        <div class="section-header">
            <p>Client Review</p>
        </div>
        <div class="owl-carousel testimonials-carousel">
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
