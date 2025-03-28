@extends('layouts.admin')
@section('title', 'Змінити історію')

@section('content')
    @include('admin.section.header')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                {{ html()->form('put')->route('admin.questions.update',$item)->open() }}
                <div class="row gy-4">
                    <div class="col-12 col-lg-4">
                        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                            <div class="app-card-body px-4 w-100">

                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-6">
                                            <div class="item-label"><strong>Ім'я</strong></div>
                                            {{ html()->text('name',$item->name)->required()->attributes(['id'=>'name','class'=>'form-control']) }}
                                        </div><!--//col-->
                                        <div class="col-6">
                                            <div class="item-label"><strong>Email</strong></div>
                                            {{ html()->text('email',$item->email)->required()->attributes(['id'=>'email','class'=>'form-control']) }}
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->

                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12">
                                            <div class="item-label"><strong>Тема</strong></div>
                                            {{ html()->text('subject',$item->subject)->required()->attributes(['id'=>'subject','class'=>'form-control']) }}
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->

                                <div class="item app-card-settings border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            {{ html()->checkbox('top',$item->top,1)->attributes(['id'=>'top','class'=>'form-check-input']) }}
                                            <label class="form-check-label" for="top">Підняти в топ</label>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->


                                <div class="item app-card-settings border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            {{ html()->checkbox('active',$item->active,1)->attributes(['id'=>'active','class'=>'form-check-input']) }}
                                            <label class="form-check-label" for="active">Активний</label>
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
                                            <div class="item-label"><strong>Питання</strong></div>
                                            {{ html()->textarea('question',$item->question)->attributes(['id'=>'question','class'=>'form-control textarea textarea-editor','cols'=>'100','rows'=>'30','style'=>'height:300px;']) }}
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->

                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12">
                                            <div class="item-label"><strong>Відповідь</strong></div>
                                            {{ html()->textarea('answer',$item->answer)->attributes(['id'=>'answer','class'=>'form-control textarea textarea-editor','cols'=>'100','rows'=>'30','style'=>'height:300px;']) }}
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->

                            </div><!--//app-card-body-->
                            <div class="col-12 p-3">
                                <a class="btn app-btn-secondary float-start" href="{{ route('admin.questions.index') }}">Назад</a>
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
                        </div><!--//app-card-->
                    </div>
                </div>
                {{ html()->form()->close() }}

            </div><!--//container-fluid-->
        </div><!--//app-content-->
    </div><!--//app-wrapper-->
@endsection
