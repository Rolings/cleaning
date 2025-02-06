<div class="row gy-4">
    <div class="col-12 col-lg-4">
        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
            <div class="app-card-body px-4 w-100">
                <div class="item app-card-settings py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-12 mb-3">
                            <div class="item-label"><strong>Ім'я</strong></div>
                            {{ html()->text('first_name')->required()->attributes(['id'=>'first_name','class'=>'form-control','wire:model.live'=>'first_name']) }}
                        </div><!--//col-->

                        <div class="col-12 mb-3">
                            <div class="item-label"><strong>Прізвище</strong></div>
                            {{ html()->text('last_name')->attributes(['id'=>'last_name','class'=>'form-control','wire:model.live'=>'last_name']) }}
                        </div><!--//col-->

                        <div class="col-12 mb-3">
                            <div class="item-label"><strong>Email</strong></div>
                            {{ html()->text('email')->attributes(['id'=>'email','class'=>'form-control','wire:model.live'=>'email']) }}
                        </div><!--//col-->

                        <div class="col-12 mb-3">
                            <div class="item-label"><strong>Телефон</strong></div>
                            {{ html()->text('phone')->required()->attributes(['id'=>'phone','class'=>'form-control','wire:model.live'=>'phone']) }}
                        </div><!--//col-->
                        <div class="col-12 mb-3">
                            <div class="item-label">Створено<strong class="float-end">-</strong></div>
                        </div><!--//col-->
                        <div class="col-12 mb-3">
                            <div class="item-label">Оновлено<strong class="float-end">-</strong></div>
                        </div><!--//col-->
                        <div class="col-12 mb-3">
                            <div class="item-label">Дата замовлення </div>
                            {{ html()->datetime('order_at')->required()->attributes(['id'=>'order_at','class'=>'form-control','wire:model.live'=>'order_at']) }}
                        </div><!--//col-->
                        <div class="col-12 mb-3">
                            <div class="item-label">Вартість обраних сервісів <strong class="float-end">${{ $costServices }}</strong></div>
                        </div><!--//col-->

                        <div class="col-12 mb-3">
                            <div class="item-label">Вартість додаткових сервісів <strong class="float-end">${{ $costAdditionalServices }}</strong></div>
                        </div><!--//col-->

                        <div class="col-12 mb-3">
                            <div class="item-label">Знижка {{ $discountPercentage }}%<strong class="float-end">${{ $discountAmount }}</strong></div>
                        </div><!--//col-->

                        <div class="col-12 mb-3">
                            <div class="item-label">Податки {{ $taxPercentage }}% <strong class="float-end">${{ $taxAmount }}</strong></div>
                        </div><!--//col-->
                        <div class="col-12 mb-3">
                            <div class="item-label">Вартість замовлення <strong class="float-end">${{ $totalCost }}</strong></div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div>
    <div class="col-12 col-lg-8">
        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
            <div class="app-card-body px-4 w-100">
                <div class="item app-card-settings py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="row">
                            <div class="col-4 mb-3">
                                <div class="item-label"><strong>Штат</strong></div>
                                {{ html()->select('state_id',$states->pluck('name','id'))->required()->attributes(['id'=>'state_id','class'=>'form-control','wire:model.live'=>'state_id']) }}
                            </div><!--//col-->

                            <div class="col-5 mb-3">
                                <div class="item-label"><strong>Місто</strong></div>
                                {{ html()->text('city')->required()->attributes(['id'=>'city','class'=>'form-control','wire:model.live'=>'city']) }}
                            </div><!--//col-->

                            <div class="col-3 mb-3">
                                <div class="item-label"><strong>ZIP</strong></div>
                                {{ html()->text('zip')->required()->attributes(['id'=>'zip','class'=>'form-control','wire:model.live'=>'zip']) }}
                            </div><!--//col-->
                        </div>
                        <div class="row">
                            <div class="col-9 mb-3">
                                <div class="item-label"><strong>Адреса</strong></div>
                                {{ html()->text('address')->required()->attributes(['id'=>'address','class'=>'form-control','wire:model.live'=>'address']) }}
                            </div><!--//col-->
                            <div class="col-3 mb-3">
                                <div class="item-label"><strong>Номер приміщення</strong></div>
                                {{ html()->text('apt_suite')->required()->attributes(['id'=>'apt_suite','class'=>'form-control','wire:model.live'=>'apt_suite']) }}
                            </div><!--//col-->
                        </div>

                        <div class="row services-list">
                            <div class="col-12 mb-3">
                                <div class="item-label"><strong>Пропозиція</strong></div>
                                {{ html()->select('offer_id',$offers->pluck('name','id'))->required()->attributes(['id'=>'offer_id','class'=>'form-control','wire:model.live'=>'offer_id']) }}
                            </div><!--//col-->

                            <div class="col-12 mb-3 services-list-block">
                                <div class="item-label"><strong>Сервіси</strong></div>
                                <ul class="row service-list-item justify-content-center m-0 p-0">
                                    @forelse($services as $service)
                                        <li class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                            {{ html()
                                                    ->checkbox('services[]',null,$service->id)
                                                    ->checked($selectedServices?->pluck('id')?->contains($service->id))
                                                  /*  ->disabled($offerServices->pluck('id')->contains($service->id))*/
                                                    ->attributes(['id'=>'service-'.$service->id,'wire:model.live'=>'selectedServicesId'])
                                                    }}
                                            <label class="col-12 d-flex justify-content-center" for="service-{{$service->id}}">{{ $service->name }}</label>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div><!--//col-->

                            <div class="col-12 mb-3 services-list-block">
                                <div class="item-label"><strong>Додаткові сервіси</strong></div>
                                <ul class="row service-list-item justify-content-center m-0 p-0">
                                    @forelse($additionalServices as $service)
                                        <li class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                            {{ html()
                                                    ->checkbox('additional_services[]',null,$service->id)
                                                    ->checked($selectedAdditionalServices?->pluck('id')?->contains($service->id))
                                       /*             ->disabled($offerAdditionalServices->pluck('id')->contains($service->id))*/
                                                    ->attributes(['id'=>'additional-services-'.$service->id,'wire:model.live'=>'selectedAdditionalServicesId'])
                                                    }}
                                            <label class="col-12 d-flex justify-content-center" for="additional-services-{{$service->id}}">{{ $service->name }}</label>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div><!--//col-->
                        </div>

                        <div class="col-12 mb-3">
                            <div class="item-label"><strong>Коментар</strong></div>
                            {{ html()->textarea('comment')->attributes(['id'=>'comment','class'=>'form-control','style'=>'height:300px;']) }}
                        </div><!--//col-->

                    </div>
                </div>
            </div>
            <div class="col-12 p-3">
                <a class="btn app-btn-secondary float-start" href="{{ route('admin.orders.index') }}">Назад</a>
                {{ html()->submit('Зберегти')->attributes(['class'=>'btn app-btn-primary float-end']) }}
                <div class="item py-3">
                    @if($errors->any())
                        <label for="setting-input-1" class="form-label badge bg-danger">{{ $errors->first() }}
                            <span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                                  data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                <svg width="1em"
                                                     height="1em"
                                                     viewBox="0 0 16 16"
                                                     class="bi bi-info-circle"
                                                     fill="currentColor"
                                                     xmlns="http://www.w3.org/2000/svg">
                                              <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                              <path
                                                  d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"></path>
                                              <circle cx="8" cy="4.5" r="1"></circle>
                                            </svg>
                                        </span>
                        </label>
                    @endif
                </div>
            </div><!--//app-card-footer-->
        </div>
    </div>
</div>

