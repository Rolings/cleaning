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
                {{ html()->form('put')->route('admin.services.update', $item->slug)->acceptsFiles()->open() }}
                <div class="row gy-4">
                    <div class="col-12 col-lg-4">
                        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                            <div class="app-card-body px-4 w-100">

                                <div class="app-card app-card-settings p-4">
                                    <div class="app-card-body">
                                        <div class="mb-3 row justify-content-between align-items-center">
                                            <div class="col-12">
                                                <div class="item-label mb-2"><strong>Фото</strong></div>
                                                <div class="item-data">
                                                    <img class="profile-image" width="300" src="{{ $item->image?->url}}"
                                                         id="image" alt="">
                                                </div>
                                            </div><!--//col-->
                                            <div class="container pt-1">
                                                <label for="images" class="drop-container">
                                                    {{ html()->file('image')->accept('image/png, image/gif, image/jpeg')->attributes(['onchange'=>'loadFile(event)']) }}
                                                    @error('icon')
                                                    <p class="alert alert-message">{{ $message }}</p>
                                                    @enderror
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item app-card-settings border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12">
                                            <div class="item-label"><strong>Додаткові послуги</strong></div>
                                            {{ html()->multiselect('additional',$additionalServices->pluck('name','id'),$item->additional)->attributes(['id'=>'additional','class'=>'form-control']) }}
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->


                                <div class="item app-card-settings border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        @foreach($roomTypes as $type)
                                            <div class="col-12">
                                                {{ html()->checkbox('active',$item->active,1)->attributes(['id'=>'active','class'=>'form-check-input']) }}
                                                <label class="form-check-label" for="active">{{ $type->name }}</label>

                                            </div><!--//col-->
                                        @endforeach
                                    </div><!--//row-->
                                </div><!--//item-->


                                <div class="item app-card-settings border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            {{ html()->checkbox('active',$item->active,1)->attributes(['id'=>'active','class'=>'form-check-input']) }}
                                            <label class="form-check-label" for="active">Active</label>
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
                                        <div class="col-6">
                                            <div class="item-label"><strong>Url</strong></div>
                                            {{ html()->text('slug',$item->slug)->attributes(['id'=>'slug','class'=>'form-control']) }}
                                        </div><!--//col-->
                                        <div class="col-6">
                                            <div class="item-label"><strong>Назва</strong></div>
                                            {{ html()->text('name',$item->name)->required()->attributes(['id'=>'name','class'=>'form-control']) }}
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->

                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-6">
                                            <div class="item-label"><strong>Ціна</strong></div>
                                            {{ html()->text('price',$item->price)->required()->attributes(['id'=>'price','class'=>'form-control']) }}
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->

                              {{--  <div class="item app-card-settings border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">

                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Кімнати</th>
                                                    @foreach($roomTypes as $type)
                                                        <th>
                                                            {{ html()->checkbox('active',$item->active,1)->attributes(['id'=>'active','class'=>'form-check-input']) }}
                                                            <label class="form-check-label" for="active">{{ $type->name }}</label>
                                                        </th><!--//col-->
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @for ($i = $roomTypes->min('min'); $i <= $roomTypes->max('max'); $i+=0.5)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    @foreach($roomTypes as $type)
                                                        @if($type->fractional)
                                                            <td>{{ html()->number('price['.$type->id.']['.$i.']')->attributes(['id'=>'slug','class'=>'form-control']) }}</td>
                                                        @elseif(!$type->fractional && is_int($i))
                                                            <td>{{ html()->number('price['.$type->id.']['.$i.']')->attributes(['id'=>'slug','class'=>'form-control']) }}</td>
                                                        @else
                                                            <td> - </td>
                                                        @endif

                                     --}}{{--                   <td> {{ is_int($i) }}</td>--}}{{--
--}}{{--
                                                            @if(!is_int($i) && !$type->fractional)
                                                             <td>   {{ html()->number('price['.$type->id.']['.$i.']')->attributes(['id'=>'slug','class'=>'form-control']) }}</td>
                                                            @else
                                                                <td> - </td>
                                                            @endif--}}{{--

                                                    @endforeach
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>

                                    </div>
                                </div>--}}

                                @foreach($roomTypes as $type)
                                    <div class="item app-card-settings border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">

                                            <div class="col-12">
                                                {{ html()->checkbox('room_type_enable[]',false,$type->id)->attributes(['id'=>'room_type_enable-'.$type->id,'data-type-id'=>$type->id,'class'=>'form-check-input js-room-type-check']) }}
                                                <label class="form-check-label" for="room_type_enable-{{$type->id}}">{{ $type->name }}</label>
                                            </div><!--//col-->
                                            <div class="row js-price-list-type-{{$type->id}} d-none">
                                                @foreach($type->getRoomSteps() as $index => $room)
                                                    <div class="col-3 col-md-4 col-sm-4 col-lg-3 col-xl-2">
                                                        <div class="item-label"><strong>{{ $room }} rooms</strong></div>
                                                        {{ html()->number('room_type_prices['.$type->id.']['.$room.']')->attributes(['id'=>'slug','class'=>'form-control']) }}
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div><!--//row-->
                                    </div><!--//item-->
                                @endforeach

                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12">
                                            <div class="item-label"><strong>Опис</strong></div>
                                            {{ html()->textarea('description',$item->description)->required()->attributes(['id'=>'description','class'=>'form-control textarea textarea-editor','cols'=>'100','rows'=>'30','style'=>'height:300px;']) }}
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                            </div><!--//app-card-body-->
                            <div class="col-12 p-3">
                                <a class="btn app-btn-secondary float-start" href="{{ route('admin.services.index') }}">Назад</a>
                                {{ html()->submit('Зберегти')->attributes(['class'=>'btn app-btn-primary float-end']) }}
                                <div class="item  py-3">
                                    @if($errors->any())
                                        <label for="setting-input-1"
                                               class="form-label badge bg-danger">{{ $errors->first() }}
                                            <span class="ms-2" data-container="body" data-bs-toggle="popover"
                                                  data-trigger="hover" data-placement="top"
                                                  data-content="This is a Bootstrap popover example. You can use popover to provide extra info.">
                                                <svg width="1em"
                                                     height="1em"
                                                     viewBox="0 0 16 16"
                                                     class="bi bi-info-circle"
                                                     fill="currentColor"
                                                     xmlns="http://www.w3.org/2000/svg">
                                              <path fill-rule="evenodd"
                                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
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
                    placeholder: 'Вибрати додаткові послуги',
                    search: 'Вибрати додаткові послуги'
                }
            });

            $(".js-room-type-check").on('click',function (){
                let id = $(this).attr('data-type-id');

                if($(this).is(':checked')){
                    $(".js-price-list-type-"+id).removeClass('d-none');
                }else{
                    $(".js-price-list-type-"+id).addClass('d-none')
                }
            })

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
