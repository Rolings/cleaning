<div>
    <div id="data-order-container" class="row">
        <div class="col-sm-12 col-md-12 col-lg-8">
            <!--Contact info-->
            <div class="col-sm-12 p-0 mt-3">
                <h5>CONTACT INFO</h5>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="form-group">
                            {{ html()->label('First Name <span class="text-danger">*</span>','first_name') }}
                            {{ html()->text('first_name',$data->first_name??old('first_name'))->required()->placeholder('')->attributes(['id'=>'first_name','class'=>'form-control','wire:model.live'=>'data.first_name']) }}
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="form-group">
                            {{ html()->label('Last Name','last_name') }}
                            {{ html()->text('last_name',$data->last_name??old('last_name'))->placeholder('')->attributes(['id'=>'last_name','class'=>'form-control','wire:model.live'=>'data.last_name']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="form-group">
                            {{ html()->label('Email','email') }}
                            {{ html()->text('email',$data->email)->placeholder('')->attributes(['id'=>'email','class'=>'form-control','wire:model.live'=>'data.email']) }}
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="form-group">
                            {{ html()->label('Mobile Number <span class="text-danger">*</span>','phone') }}
                            {{ html()->text('phone',$data->phone??old('phone'))->required()->placeholder('')->attributes(['id'=>'phone','class'=>'form-control','wire:model.live'=>'data.phone']) }}
                        </div>
                    </div>
                </div>
            </div>
            <!--Address-->
{{--            <div class="col-sm-12 p-0 mt-3">
                <h5>ADDRESS</h5>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="form-group">
                            {{ html()->label('State <span class="text-danger">*</span>','state_id') }}
                            {{ html()->select('state_id',$this->checkoutService->states->pluck('name','id'),$this->checkoutService->states->filter(fn($state) => $state->default)?->first()?->id)->required()->attributes(['id'=>'state_id','class'=>'custom-select','wire:model.live'=>'data.state_id']) }}
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                        <div class="form-group">
                            {{ html()->label('City <span class="text-danger">*</span>','city') }}
                            {{ html()->text('city',$data->city)->required()->placeholder('')->attributes(['id'=>'city','class'=>'form-control','wire:model.live'=>'data.city']) }}
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                        <div class="form-group">
                            {{ html()->label('Zip <span class="text-danger">*</span>','zip') }}
                            {{ html()->text('zip',$data->zip)->required()->placeholder('')->attributes(['id'=>'zip','class'=>'form-control','wire:model.live'=>'data.zip']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                        <div class="form-group">
                            {{ html()->label('Address <span class="text-danger">*</span>','address') }}
                            {{ html()->text('address',$data->address)->required()->placeholder('')->attributes(['id'=>'address','class'=>'form-control','wire:model.live'=>'data.address']) }}
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                        <div class="form-group">
                            {{ html()->label('Apt/Suite <span class="text-danger">*</span>','apt_suite') }}
                            {{ html()->text('apt_suite',$data->apt_suite)->placeholder('')->attributes(['id'=>'apt_suite','class'=>'form-control','wire:model.live'=>'data.apt_suite']) }}
                        </div>
                    </div>
                </div>
            </div>
            <!--Service date-->
            <div class="col-sm-12 p-0 mt-3">
                <h5>SERVICE DATE</h5>
                <div class="row">
                    <div class="col-12" wire:ignore>
                        <div class="form-group">
                            {{ html()->label('Date <span class="text-danger">*</span>','date') }}
                            {{ html()->text('order_at')->required()->placeholder('')->attributes(['id'=>'datetime','class'=>'form-control date-time-picker','wire:model.live'=>'data.datetime']) }}
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
        <div class="col-sm-8 col-md-8 col-lg-4 d-none d-sm-none d-md-none d-lg-block">
            <!--Info-->
            <div class="col-sm-12 p-0 mt-3">
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-4">
                        <div class="card h-100 border-0">
                            <ul class="list-group list-group-flush">
                                <li class="d-flex list-group-item justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                         class="bi bi-clock" viewBox="0 0 16 16">
                                        <path
                                            d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                    </svg>
                                    <span class="ml-2">SAVES YOU TIME</span>
                                </li>
                                <li class="list-group-item"><p>We help you live smarter, giving you time to focus on
                                        what's most important.</p></li>

                                <li class="d-flex list-group-item justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                         class="bi bi-shield-shaded" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M8 14.933a1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56"/>
                                    </svg>
                                    <span class="ml-2">SAFETY FIRST</span>

                                </li>
                                <li class="list-group-item"><p>We rigorously vet all of our Cleaners, who undergo
                                        identity checks as well as in-person interviews.</p></li>

                                <li class="d-flex list-group-item justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                         class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                        <path
                                            d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                                    </svg>
                                    <span class="ml-2">ONLY THE BEST QUALITY</span>
                                </li>
                                <li class="list-group-item"><p>Our skilled professionals go above and beyond on every
                                        job. Cleaners are rated and reviewed after each task.</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8">
            <h5>ORDER</h5>
            <!--Service-->
            <div class="col-sm-12 p-0 mt-3">
                <div class="row services-list mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            {{ html()->label('Services') }}
                            <div class="d-flex row justify-content-center  align-items-center float-right m-0 p-0">
                                <span class="p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-cart-check" viewBox="0 0 16 16">
                                      <path
                                          d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                                      <path
                                          d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                    </svg>
                                </span>
                                <span
                                    class="p-1">{{ $data->selectedServices->count() ? ''.$data->selectedServices->count() : '' }}</span>
                            </div>
                            {{ html()->hidden('services_id',$data->selectedServices?->pluck('id')?->toJson()) }}
                        </div>
                        <div class="services-list-block">
                            <ul class="row service-list-item justify-content-center">
                                @forelse($this->checkoutService->services as $service)
                                    <li class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                        {{ html()
                                                ->checkbox('services',null,$service->id)
                                                ->attributes(['id'=>'service-'.$service->id,'wire:model.live'=>'selectedServicesId'])
                                                }}
                                        <label class="col-12 d-flex justify-content-center"
                                               for="service-{{$service->id}}">{{ $service->name }}</label>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">

                        <div class="form-group">
                            {{ html()->label('Rooms') }}
                            <div class="d-flex row justify-content-center  align-items-center float-right m-0 p-0">
                                <span class="p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-cart-check" viewBox="0 0 16 16">
                                      <path
                                          d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                                      <path
                                          d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                    </svg>
                                </span>
                                      <span class="p-1">{{ $data->selectedServices->count() ? ''.$data->selectedServices->count() : '' }}</span>
                            </div>
                              {{ html()->hidden('services_id',$data->selectedServices?->pluck('id')?->toJson()) }}
                        </div>

                        <div class="rooms-list-block">
                            <ul class="rooms-list-item d-flex flex-wrap gap-3 p-0 m-0 list-unstyled">
                                @foreach($this->checkoutService->prices as $price)
                                    <li class="col-12 col-sm-6 col-md-6 col-lg-4 d-flex justify-content-center">
                                        <div class="checkbox-wrapper">
                                            <span>{{ $price->roomType->name }}</span>
                                            {{ html()
                                               ->checkbox('rooms',null,$price->roomType->id)
                                               ->attributes(['id'=>'room-type-'.$price->roomType->id,'class'=>'tgl tgl-light','wire:model.live'=>'selectedRoomId'])
                                               }}
                                            <label class="tgl-btn" for="room-type-{{ $price->roomType->id }}"></label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row additional-services-list">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            {{ html()->label('Additional services') }}
                            <div class="d-flex row justify-content-center  align-items-center float-right m-0 p-0">
                                <span class="p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-cart-check" viewBox="0 0 16 16">
                                      <path
                                          d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                                      <path
                                          d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                    </svg>
                                </span>
                                <span
                                    class="p-1">{{ $data->selectedAdditionalServices->count() ? ''.$data->selectedAdditionalServices->count() : '' }}</span>
                            </div>

                            {{ html()->hidden('additional_services_id',$data->selectedAdditionalServices?->pluck('id')?->toJson()) }}
                        </div>

                    </div>
                    <div class="col-12 row justify-content-center ml-0 mr-0 p-0">
                        @foreach($this->checkoutService->additionalServices as $service)
                            <div class="additional-service-item col-12 col-sm-12 col-md-3 col-lg-6 col-xl-3 mb-4 p-0">
                                {{ html()->checkbox('additional-services',false,$service->id)->attributes(['id'=>'additional-services-'.$service->id,'wire:model.live'=>'selectedAdditionalServicesId']) }}
                                <label class=" d-block additional-services-label"
                                       for="additional-services-{{ $service->id }}"
                                       title="{!! $service->description !!}">
                                <span>
                                    <img src="{{ $service->iconUrl }}" alt="{{ $service->name }}">
                                </span>
                                    <span>{{ $service->name }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            {{ html()->label('Comment for order','comment') }}
                            {{ html()->textarea('comment',$data->comment)->attributes(['id'=>'comment','class'=>'form-control','cols'=>'100','rows'=>'30','style'=>'height:100px;']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4">
            <!--Calculation-->
            <div class="col-sm-12 p-0 mt-3">
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="text-center p-3">
                                    <h5 class="card-title">BOOKING SUMMARY</h5>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <span class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                          <path
                                              d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                                          <path
                                              d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
                                        </svg>
                                    </span>
                                  <span>{{ $offer->name??'Select a service...' }}</span>
                                </li>
                                <li class="list-group-item">
                                    <span class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                        <path
                                            d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/>
                                        <path
                                            d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                    </svg>
                                    </span>
                                    <span>{{ $service->datetimeFormat??'Choose service date...' }}</span>
                                </li>
                                <li class="list-group-item price-amount">
                                    <span>Services: </span><span>${{ $service->totalCost }}</span>
                                </li>
                                <li class="list-group-item price-amount">
                                    <span>Additional services: </span> <span>${{ $service->costAdditionalServices }}</span>
                                </li>
                                @if($service->discountAmount>0)
                                    <li class="list-group-item price-amount">
                                        <span>Discount: </span><span>${{ $service->discountAmount }}</span>
                                    </li>
                                @endif
                                @if($service->taxAmount>0)
                                    <li class="list-group-item price-amount">
                                        <span>Sales tax: </span>
                                        <span title="{{ $service->taxPercentage }}%">
                                        ${{ $service->taxAmount }}
                                    </span>
                                    </li>
                                @endif
                                <li class="list-group-item price-amount">
                                    <span>TOTAL</span> <span>${{ $service->totalCost }}</span>
                                </li>
                            </ul>
                            @if($validation)
                                <div class="card-body text-center">
                                    <button type="submit" class="btn btn-outline-primary btn-lg">Book now</button>
                                </div>
                            @else
                                <div class="card-body text-center">
                                    @if($totalCost==0)
                                        <div
                                            class="alert alert-warning d-flex align-items-center cursor-pointer js-scroll-to"
                                            role="alert" data-scroll-to="offer_id">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="currentColor"
                                                 class="bi bi-patch-exclamation bi flex-shrink-0 me-2"
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0z"/>
                                                <path
                                                    d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                                            </svg>
                                            <div class="row ml-1">
                                                Please choose service!
                                            </div>
                                        </div>
                                    @endif
                                    @if(empty($first_name))
                                        <div
                                            class="alert alert-warning d-flex align-items-center cursor-pointer js-scroll-to"
                                            role="alert" data-scroll-to="first_name">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="currentColor"
                                                 class="bi bi-patch-exclamation bi flex-shrink-0 me-2"
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0z"/>
                                                <path
                                                    d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                                            </svg>
                                            <div class="row ml-1">
                                                Please enter your name!
                                            </div>
                                        </div>
                                    @endif
                                    @if(strlen($data->phone) < 17)
                                        <div
                                            class="alert alert-warning d-flex align-items-center cursor-pointer js-scroll-to"
                                            role="alert" data-scroll-to="phone">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="currentColor"
                                                 class="bi bi-patch-exclamation bi flex-shrink-0 me-2"
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0z"/>
                                                <path
                                                    d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                                            </svg>
                                            <div class="row ml-1">
                                                Please enter your phone!
                                            </div>
                                        </div>
                                    @endif
                                    @if(empty($address))
                                        <div
                                            class="alert alert-warning d-flex align-items-center cursor-pointer js-scroll-to"
                                            role="alert" data-scroll-to="address">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="currentColor"
                                                 class="bi bi-patch-exclamation bi flex-shrink-0 me-2"
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0z"/>
                                                <path
                                                    d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                                            </svg>
                                            <div class="row ml-1">
                                                Please enter your address!
                                            </div>
                                        </div>
                                    @endif
                                    @if(empty($apt_suite))
                                        <div
                                            class="alert alert-warning d-flex align-items-center cursor-pointer js-scroll-to"
                                            role="alert" data-scroll-to="apt_suite">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="currentColor"
                                                 class="bi bi-patch-exclamation bi flex-shrink-0 me-2"
                                                 viewBox="0 0 16 16">
                                                <path
                                                    d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0z"/>
                                                <path
                                                    d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                                            </svg>
                                            <div class="row ml-1">
                                                Please enter your apartment number!
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@script
<script>
    $('#phone').mask('+1 (000) 000-0000');

    $(".js-scroll-to").on('click', function () {
        let object = $("#" + $(this).attr('data-scroll-to'));
        object.addClass("error");

        object.on('input', function () {
            $(this).removeClass('error')
        });
        $([document.documentElement, document.body]).animate({
            scrollTop: object.offset().top - 50
        }, 500, () => {
            object.focus();
        });
    });

    const initializeFlatpickr = () => {
        flatpickr(document.getElementsByClassName('date-time-picker')[0], {
            enableTime: true,
            noCalendar: false,
            dateFormat: "m/d/Y h:i K",
            time_24hr: false,
            minDate: new Date(),
            minuteIncrement: 30
        });
    }

    document.addEventListener('livewire:load', function () {
        initializeFlatpickr();
    });

    document.addEventListener('livewire:updated', function () {
        initializeFlatpickr();
    });

    document.addEventListener('livewire:initialized', function () {
        initializeFlatpickr();
    });
</script>
@endscript

