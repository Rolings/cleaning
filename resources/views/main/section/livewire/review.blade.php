<div class="testimonial">
    <div class="container">
        <div class="section-header">
            <p>Client Review</p>
        </div>
        <div class="owl-carousel testimonials-carousel">
            @foreach($items as $item)
                <div class="testimonial-item">
                    @if(!is_null($item->image))
                        <div class="testimonial-img">
                            <img src="{{ $item->image?->url }}" alt="">
                        </div>
                    @endif

                    <div class="testimonial-content">
                        <h3>{{ $item->name }}</h3>
                        <p>{!! $item->comment  !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
