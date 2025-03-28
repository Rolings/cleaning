
<div class="service">
    <div class="container">
        <div class="section-header">
            <p>Top Services</p>
        </div>
        <div class="row">
            @foreach ($services as $service)
                <div class="col-lg-3 col-md-6">
                    <div class="service-item">
                        <img src="build/images/main/service-1.jpg" alt="Service">
                        <h3>{{ $service->id }} {{ $service->name }}</h3>
                        <p>
                            {{ $service->limitDescription }}
                        </p>
                        <a class="btn" href="{{ route('services.show',$service->slug) }}">Learn More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
