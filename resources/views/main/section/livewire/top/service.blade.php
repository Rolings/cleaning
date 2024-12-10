<div class="service">
    <div class="container">
        <div class="section-header">
            <p>Top Services</p>
        </div>
        <div class="row">
            @foreach ($items as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="service-item">
                        <img src="{{ $item->image?->url }}" width="100" alt="Service">
                        <h3>{{ $item->id }} {{ $item->title }}</h3>
                        <p>
                            {!! $item->limitDescription !!}
                        </p>
                        <a class="btn" href="{{ route('services.show',$item->slug) }}">Learn More</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <a class="btn-global" href="{{ route('services.index') }}">Learn More</a>
        </div>
    </div>
</div>
