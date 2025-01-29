<div class="row gy-4">
    <div class="col-12 col-lg-4">
        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
            <div class="app-card-body px-4 w-100">
                <div class="item app-card-settings py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-12 mb-3">
                            <div class="item-label"><strong>Ім'я</strong></div>
                            {{ html()->text('first_name',$order->first_name)->required()->attributes(['id'=>'first_name','class'=>'form-control']) }}
                        </div><!--//col-->

                        <div class="col-12 mb-3">
                            <div class="item-label"><strong>Прізвище</strong></div>
                            {{ html()->text('last_name',$order->last_name)->required()->attributes(['id'=>'last_name','class'=>'form-control']) }}
                        </div><!--//col-->

                        <div class="col-12 mb-3">
                            <div class="item-label"><strong>Email</strong></div>
                            {{ html()->text('email',$order->email)->attributes(['id'=>'email','class'=>'form-control']) }}
                        </div><!--//col-->

                        <div class="col-12 mb-3">
                            <div class="item-label"><strong>Телефон</strong></div>
                            {{ html()->text('phone',$order->phone)->required()->attributes(['id'=>'phone','class'=>'form-control']) }}
                        </div><!--//col-->
                        <div class="col-12 mb-3">
                            <div class="item-label">Дата створення <strong class="float-end"> {{ $order->created_at->format('d F Y / h:i A') }}</strong></div>
                        </div><!--//col-->
                        <div class="col-12 mb-3">
                            <div class="item-label">Дата редагування <strong class="float-end"> {{ $order->updated_at->format('d F Y / h:i A') }}</strong></div>
                        </div><!--//col-->
                        <div class="col-12 mb-3">
                            <div class="item-label">Дата замовлення <strong class="float-end"> {{ $order->order_at->format('d F Y / h:i A') }}</strong></div>
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
                            <div class="col-9 mb-3">
                                <div class="item-label"><strong>Адреса</strong></div>
                                {{ html()->text('address',$order->address)->required()->attributes(['id'=>'address','class'=>'form-control']) }}
                            </div><!--//col-->
                            <div class="col-3 mb-3">
                                <div class="item-label"><strong>Номер приміщення</strong></div>
                                {{ html()->text('apt_suite',$order->apt_suite)->required()->attributes(['id'=>'apt_suite','class'=>'form-control']) }}
                            </div><!--//col-->
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">
                                <div class="item-label"><strong>Штат</strong></div>
                                {{ html()->select('state_id',$states->pluck('name','id'),$order->state_id)->required()->attributes(['id'=>'state_id','class'=>'form-control','wire:model.live'=>'state_id']) }}
                            </div><!--//col-->

                            <div class="col-5 mb-3">
                                <div class="item-label"><strong>Місто</strong></div>
                                {{ html()->text('city',$city)->required()->attributes(['id'=>'city','class'=>'form-control']) }}
                            </div><!--//col-->

                            <div class="col-3 mb-3">
                                <div class="item-label"><strong>ZIP</strong></div>
                                {{ html()->text('zip',$zip)->required()->attributes(['id'=>'zip','class'=>'form-control']) }}
                            </div><!--//col-->
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="item-label"><strong>Пропозиція</strong></div>
                                {{ html()->select('offer_id',$offers->pluck('name','id'),$order->offer_id)->required()->attributes(['id'=>'offer_id','class'=>'form-control','wire:model.live'=>'offer_id']) }}
                            </div><!--//col-->

                            <div class="col-12 mb-3">
                                <div class="item-label"><strong>Сервіси включені до пропозиції</strong></div>
                                <div></div>
                            </div><!--//col-->

                            <div class="col-12 mb-3">
                                <div class="item-label"><strong>Сервіси</strong></div>
                                {{ html()->multiselect('services_id',$allServices->pluck('name','id'),$selectedOfferServices?->pluck('id'))->attributes(['id'=>'services_id','class'=>'form-control']) }}
                            </div><!--//col-->

                            <div class="col-12 mb-3">
                                <div class="item-label"><strong>Додаткові сервіси</strong></div>
                                {{ html()->multiselect('additional_services_id',$offerAdditionalServices?->pluck('name','id'),$selectedOfferAdditionalServices?->pluck('id'))->attributes(['id'=>'additional_services_id','class'=>'form-control']) }}
                            </div><!--//col-->
                        </div>

                        <div class="col-12 mb-3">
                            <div class="item-label"><strong>Коментар</strong></div>
                            {{ html()->textarea('comment',$order->comment)->attributes(['id'=>'comment','class'=>'form-control','style'=>'height:300px;']) }}
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

@script
<script>
    const initializeMultiselect = () => {
        const services = $('select[multiple]');
        services.multiselect('destroy');
        services.multiselect({
            columns: 1,
            search: true,
            selectAll: true,
            texts: {
                placeholder: 'Вибрати додаткові послуги',
                search: 'Вибрати додаткові послуги'
            }
        });
    }

    document.addEventListener('livewire:initialized', function () {
        initializeMultiselect();
    });
/*
    document.addEventListener('livewire:update', function () {
        initializeMultiselect();
    });*/

</script>
@endscript
