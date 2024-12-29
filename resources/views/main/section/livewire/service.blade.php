<div class="service">
    <div class="container-fluid p-0">
        <div class="row mb-3">
            @foreach ($services as $service)
                <div class="item-shadow col-lg-4 col-md-6 mb-5">
                    <div class="service-item">
                        <img src="{{ $service->imageUrl }}" width="100" alt="Service">
                        <div class="service-info">
                            <a href="{{ route('services.show',$service->slug) }}">
                                <div class="service-title">
                                    <h3>{{ $service->name }}</h3>
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
            {{ $services->links('main.section.pagination') }}
        </div>
    </div>
</div>
