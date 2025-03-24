<div class="service">
    <div class="container-fluid p-0">
        <div class="section-header">
            <p>Top Services</p>
        </div>
        <div class="row mb-3">
            @foreach ($items as $item)
                <div class="item-shadow col-lg-4 col-md-6 mb-5">
                    <div class="service-item">
                        <div class="services-image">
                            <a href="{{ route('services.show', $item->slug) }}">
                                <img src="{{ $item->imageUrl }}" alt="Service">
                            </a>
                        </div>
                        <div class="services-text">
                            <div class="services-title">
                                <h3 class="title">
                                    <a href="{{ route('services.show', $item->slug) }}">{{ $item->name }}</a>
                                </h3>
                            </div>
                            <p>{!! $item->limitDescription !!}</p>
                            <div class="service-link">
                                <a href="{{ route('services.show', $item->slug) }}">
                                    Read more
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 12h14m0 0-6-6m6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <a class="btn-global" href="{{ route('services.index') }}">Learn More</a>
        </div>
    </div>
</div>
