<!-- Modal -->
<div wire:ignore.self class="modal fade" id="services-list" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="services-list-label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="services-list-label">Add services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="additional-services-list row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                        @foreach($services as $service)
                            <div class="additional-service-item col-12 col-sm-12 col-md-4 col-lg-6 col-xl-3 mb-3 p-0">
                                {{ html()->checkbox('services',false,$service->id)->attributes(['id'=>'services-'.$service->id,'wire:model.live'=>'servicesId']) }}
                                <label class="d-block additional-services-label" for="services-{{$service->id}}" title="{!! $service->description !!}">
                                <span>
                                    <img src="{{ $service->imageUrl }}" alt="{{ $service->name }}">
                                </span>
                                    <span>{{ $service->name }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
