<div class="service">
    <div class="container">
        <div class="section-header">
            <h1>Our services</h1>
        </div>
        <div class="row">
            @foreach ($services as $service)
                <div class="col-lg-3 col-md-6">
                    <div class="service-item">
                        <img src="{{ $service->imageUrl }}" width="100" alt="Service">
                        <h3>{{ $service->id }} {{ $service->name }}</h3>
                        <p>
                            {!! $service->limitDescription !!}
                        </p>
                        <a class="btn" href="{{ route('services.show',$service->slug) }}">Learn More</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row justify-content-center">
            {{ $services->links('main.section.pagination') }}
        </div>
    </div>
</div>
