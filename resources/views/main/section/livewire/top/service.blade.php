<div class="service">
    <div class="container-fluid p-0">
        <div class="section-header">
            <p>Top Services</p>
        </div>
        <div class="row mb-3">
            @foreach ($items as $item)
                <div class="item-shadow col-lg-4 col-md-6">
                    <div class="service-item">
                        <img src="{{ $item->imageUrl }}" width="100" alt="Service">
                        <div class="service-info">
                            <a href="{{ route('services.show',$item->slug) }}">
                                <div class="service-title">
                                    <h3>{{ $item->name }}</h3>
                                </div>
                                <div class="service-arrow">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="18px" height="18px" viewBox="0 0 408 408"
                                         style="enable-background:new 0 0 408 408;" xml:space="preserve">
                                         <polygon points="204,0 168.3,35.7 311.1,178.5 0,178.5 0,229.5 311.1,229.5 168.3,372.3 204,408 408,204"></polygon>
                                    </svg>

                                </div>
                            </a>
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
