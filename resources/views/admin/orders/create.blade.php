@extends('layouts.admin')
@section('title', 'Змінити замовлення')

@section('content')
    @include('admin.section.header')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Нове замовлення</h1>
                    </div>
                </div>

                {{ html()->form()->route('admin.orders.store')->acceptsFiles()->open() }}
                <div class="row gy-4">

                    <div class="col-12 col-lg-4">
                        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                            <div class="app-card-body px-4 w-100">
                                <div class="item app-card-settings py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 mb-3">
                                            <div class="item-label"><strong>Ім'я</strong></div>
                                            {{ html()->text('first_name')->required()->attributes(['id'=>'first_name','class'=>'form-control']) }}
                                        </div><!--//col-->

                                        <div class="col-12 mb-3">
                                            <div class="item-label"><strong>Прізвище</strong></div>
                                            {{ html()->text('last_name')->required()->attributes(['id'=>'last_name','class'=>'form-control']) }}
                                        </div><!--//col-->

                                        <div class="col-12 mb-3">
                                            <div class="item-label"><strong>Email</strong></div>
                                            {{ html()->text('email')->attributes(['id'=>'email','class'=>'form-control']) }}
                                        </div><!--//col-->

                                        <div class="col-12 mb-3">
                                            <div class="item-label"><strong>Телефон</strong></div>
                                            {{ html()->text('phone')->required()->attributes(['id'=>'phone','class'=>'form-control']) }}
                                        </div><!--//col-->
                                        <div class="col-12 mb-3">
                                            <div class="item-label">Дата створення <strong class="float-end">-</strong></div>
                                        </div><!--//col-->
                                        <div class="col-12 mb-3">
                                            <div class="item-label">Дата редагування <strong class="float-end">-</strong></div>
                                        </div><!--//col-->
                                        <div class="col-12 mb-3">
                                            <div class="item-label">Дата замовлення <strong class="float-end">-</strong></div>
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
                                                {{ html()->text('address')->required()->attributes(['id'=>'address','class'=>'form-control']) }}
                                            </div><!--//col-->
                                            <div class="col-3 mb-3">
                                                <div class="item-label"><strong>Номер приміщення</strong></div>
                                                {{ html()->text('apt_suite')->required()->attributes(['id'=>'apt_suite','class'=>'form-control']) }}
                                            </div><!--//col-->
                                        </div>
                                        <div class="row">
                                            <div class="col-4 mb-3">
                                                <div class="item-label"><strong>Штат</strong></div>
                                                {{ html()->select('state_id',$states->pluck('name','id'))->required()->attributes(['id'=>'state_id','class'=>'form-control']) }}
                                            </div><!--//col-->

                                            <div class="col-6 mb-3">
                                                <div class="item-label"><strong>Місто</strong></div>
                                                {{ html()->text('city')->required()->attributes(['id'=>'city','class'=>'form-control']) }}
                                            </div><!--//col-->

                                            <div class="col-2 mb-3">
                                                <div class="item-label"><strong>ZIP</strong></div>
                                                {{ html()->text('zip')->required()->attributes(['id'=>'zip','class'=>'form-control']) }}
                                            </div><!--//col-->
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <div class="item-label"><strong>Пропозиція</strong></div>
                                                {{ html()->select('offer_id',$offers->pluck('name','id'))->required()->attributes(['id'=>'offer_id','class'=>'form-control']) }}
                                            </div><!--//col-->

                                            <div class="col-12 mb-3">
                                                <div class="item-label"><strong>Сервіси</strong></div>
                                                {{ html()->multiselect('additional',$services->pluck('name','id'))->attributes(['id'=>'additional','class'=>'form-control']) }}
                                            </div><!--//col-->

                                            <div class="col-12 mb-3">
                                                <div class="item-label"><strong>Додаткові сервіси</strong></div>
                                                {{ html()->multiselect('additional',$additionalServices->pluck('name','id'))->attributes(['id'=>'additional','class'=>'form-control']) }}
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
                {{ html()->form()->close() }}

            </div><!--//container-fluid-->
        </div><!--//app-content-->
    </div><!--//app-wrapper-->
@endsection

@section('js')

    <script>
        var loadFile = function (event) {
            var output = document.getElementById('avatar');
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
                    placeholder: 'Вибрати додаткові послуги',
                    search: 'Вибрати додаткові послуги'
                }
            });
        }

    </script>
@endsection

@section('css')
    <style>
        input[type=file] {
            width: 350px;
            max-width: 100%;
            color: #444;
            padding: 5px;
            background: #fff;
            border-radius: 10px;
            border: 1px solid #555;
        }

        input[type=file]::file-selector-button {
            margin-right: 20px;
            border: none;
            background: #084cdf;
            padding: 10px 20px;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=file]::file-selector-button:hover {
            background: #0d45a5;
        }
    </style>
@endsection

