<!-- Modal -->
<div class="modal fade" id="services-list" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="services-list-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="services-list-label">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="row">

                        @foreach($services as $service)
                            <div class="additional-service-item col-12 col-sm-12 col-md-4 col-lg-6 col-xl-4 mb-4 p-0">
                                {{ html()->checkbox('including-services',false,$service->id)->attributes(['id'=>'including-services-'.$service->id,'wire:model.live'=>'includingSelectedServices']) }}
                                <label class="d-flex including-services-label" for="including-services-{{$service->id}}" title="{!! $service->description !!}">
                                <span>
                                    <img src="{{ $service->iconUrl }}" alt="{{ $service->name }}">
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
