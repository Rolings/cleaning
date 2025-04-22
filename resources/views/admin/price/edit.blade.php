@extends('layouts.admin')
@section('title', $item->name)

@section('content')
    @include('admin.section.header')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">{{ $item->name }}</h1>
                    </div>
                </div><!--//row-->
                {{ html()->form('put')->route('admin.prices.update', $item)->open() }}
                    <div class="row gy-4">
                        <div class="col-12 col-lg-4">
                            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                                <div class="app-card-body px-4 w-100">

                                    <div class="item app-card-settings border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-12">
                                                <div class="item-label"><strong>Сервіс</strong></div>
                                                {{ html()->select('service_id',$services->pluck('name','id'),$item->service_id)->attributes(['id'=>'services','class'=>'form-control']) }}
                                            </div><!--//col-->
                                        </div><!--//row-->
                                    </div><!--//item-->

                                    <div class="item app-card-settings border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-12">
                                                <div class="item-label"><strong>Тип кімнати</strong></div>
                                                {{ html()->select('room_type_id',$roomTypes->pluck('name','id'),$item->room_type_id)->attributes(['id'=>'services','class'=>'form-control']) }}
                                            </div><!--//col-->
                                        </div><!--//row-->
                                    </div><!--//item-->

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                                <div class="app-card-body px-4 w-100">

                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-12">
                                                <div class="item-label"><strong>Кількість кімнат</strong></div>
                                                {{ html()->number('room_quantity',$item->room_quantity)->attributes(['id'=>'room_quantity','step'=>'0.5','class'=>'form-control']) }}
                                            </div><!--//col-->
                                        </div><!--//row-->
                                    </div><!--//item-->

                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-12">
                                                <div class="item-label"><strong>Ціна за 1 кімнату <span>*</span></strong></div>
                                                {{ html()->text('price_by_unit',$item->price_by_unit)->required()->attributes(['id'=>'price_by_unit','class'=>'form-control']) }}
                                            </div><!--//col-->
                                        </div><!--//row-->
                                    </div><!--//item-->

                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-12">
                                                <div class="item-label"><strong>Ціна за кожну наступну кімнату</strong></div>
                                                {{ html()->text('price_for_next_unit',$item->price_for_next_unit)->required()->attributes(['id'=>'price_for_next_unit','class'=>'form-control']) }}
                                            </div><!--//col-->
                                        </div><!--//row-->
                                    </div><!--//item-->

                                </div><!--//app-card-body-->
                                <div class="col-12 p-3">
                                    <a class="btn app-btn-secondary float-start" href="{{ route('admin.prices.index') }}">Назад</a>
                                    {{ html()->submit('Зберегти')->attributes(['class'=>'btn app-btn-primary float-end']) }}
                                    <div class="item  py-3">
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
                            </div><!--//app-card-->
                        </div>

                    </div>
                {{ html()->form()->close() }}

            </div><!--//container-fluid-->
        </div><!--//app-content-->
    </div><!--//app-wrapper-->
@endsection
@section('js')
    <script>
        var loadFile = function (event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
        window.onload = () => {
            $('select[multiple]').multiselect({
                columns: 1,
                search: true,
                selectAll: true,
                texts: {
                    placeholder: 'Вибрати сервіси',
                    search: 'Вибрати сервіси'
                }
            });
        }
    </script>
@endsection
