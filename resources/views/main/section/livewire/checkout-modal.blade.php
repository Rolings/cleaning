<!-- Modal -->
<div wire:ignore.self class="modal fade" id="services-list" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="services-list-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="services-list-label">Change services</h5>
                <span class="btn-close cursor-pointer" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                    </svg>
                </span>

            </div>
            <div class="modal-body">
                <div class="modal-services-list">
                    @foreach($services as $service)
                        <div class="modal-services-group col-12 p-0">
                            {{ html()->checkbox('services',false,$service->id)->attributes(['id'=>'services-'.$service->id,'wire:model.live'=>'servicesId']) }}
                            <label for="services-{{$service->id}}" title="{!! $service->description !!}">{{ $service->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-close" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@script
<script>
    $(".btn-close").on('click',()=>$("#services-list").modal('hide'));
</script>
@endscript
