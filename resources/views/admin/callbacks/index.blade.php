@extends('layouts.admin')
@section('title', 'Запити на зворотній дзвінок')

@section('content')
    @include('admin.section.header')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Запити на зворотній дзвінок</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    {{ html()->form('get')->route(request()->route()->getName())->attributes(['class'=>'table-search-form row gx-1 align-items-center'])->open() }}
                                        <div class="col-auto">
                                            {{ html()->text('search',request()->search)->required()->placeholder('Пошук')->attributes(['id'=>'search','class'=>'form-control search-orders']) }}
                                        </div>
                                        <div class="col-auto">
                                            {{ html()->submit('Пошук')->attributes(['class'=>'btn app-btn-secondary']) }}
                                        </div>
                                    <div class="col-auto">
                                        <a class="btn app-btn-secondary info" href="{{ route('admin.callbacks.index') }}">Скинути</a>
                                    </div>
                                    {{ html()->form()->close() }}
                                </div>
                            </div><!--//row-->
                        </div><!--//table-utilities-->
                    </div><!--//col-auto-->
                </div><!--//row-->

                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link @if(request()->route()->named('admin.callbacks.index')) active @endif" id="callbacks-all-tab" href="{{ route('admin.callbacks.index') }}"
                       role="tab">Всі</a>
                    <a class="flex-sm-fill text-sm-center nav-link @if(request()->route()->named('admin.callbacks.index.new')) active @endif" id="callbacks-new-tab" href="{{ route('admin.callbacks.index.new') }}"
                       role="tab">Нові</a>
                    <a class="flex-sm-fill text-sm-center nav-link @if(request()->route()->named('admin.callbacks.index.read')) active @endif" id="callbacks-read-tab" href="{{ route('admin.callbacks.index.read') }}"
                       role="tab">Прочитані</a>
                </nav>
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade @if(request()->route()->named('admin.callbacks.index')) show active @endif" id="callbacks-all" role="tabpanel">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                        <tr>
                                            <th class="cell">#</th>
                                            <th class="cell">Ім'я клієнта</th>
                                            <th class="cell">Date</th>
                                            <th class="cell">Статус</th>
                                            <th class="cell"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($callbacks as $callback)
                                            <tr>
                                                <td class="cell"># {{ $callback->id }}</td>
                                                <td class="cell"><span class="truncate">{{ $callback->name }}</span></td>
                                                <td class="cell"><span>{{ $callback->created_at->format('F d Y') }}</span><span class="note">{{ $callback->created_at->format(' h:i A') }}</span></td>
                                                <td class="cell">
                                                    @if($callback->is_read)
                                                        <span class="badge bg-success">Прочитано</span>
                                                    @else
                                                        <span class="badge bg-warning">Нове</span>
                                                    @endif
                                                </td>
                                                <td class="cell">
                                                    <span class="btn-sm app-btn-secondary cursor-pointer show-callback" data-action="{{ route('admin.callbacks.show',$callback) }}"
                                                          data-id="{{ $callback->id }}">    Деталі</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div><!--//table-responsive-->

                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                        <nav class="app-pagination">
                            {{ $callbacks->withQueryString()->links("admin.section.pagination") }}
                        </nav><!--//app-pagination-->
                    </div><!--//tab-pane-->

                    <div class="tab-pane fade @if(request()->route()->named('admin.callbacks.index.new')) show active @endif" id="callbacks-new" role="tabpanel">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                        <tr>
                                            <th class="cell">#</th>
                                            <th class="cell">Ім'я клієнта</th>
                                            <th class="cell">Date</th>
                                            <th class="cell">Статус</th>
                                            <th class="cell"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($callbacks as $callback)
                                            <tr>
                                                <td class="cell"># {{ $callback->id }}</td>
                                                <td class="cell"><span class="truncate">{{ $callback->name }}</span></td>
                                                <td class="cell"><span>{{ $callback->created_at->format('F d Y') }}</span><span class="note">{{ $callback->created_at->format(' h:i A') }}</span></td>
                                                <td class="cell">
                                                    @if($callback->is_read)
                                                        <span class="badge bg-success">Прочитано</span>
                                                    @else
                                                        <span class="badge bg-warning">Нове</span>
                                                    @endif
                                                </td>
                                                <td class="cell">
                                                    <span class="btn-sm app-btn-secondary cursor-pointer show-callback" data-action="{{ route('admin.callbacks.show',$callback) }}"
                                                          data-id="{{ $callback->id }}">Деталі</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div><!--//table-responsive-->

                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                        <nav class="app-pagination">
                            {{ $callbacks->withQueryString()->links("admin.section.pagination") }}
                        </nav><!--//app-pagination-->
                    </div><!--//tab-pane-->

                    <div class="tab-pane fade @if(request()->route()->named('admin.callbacks.index.read')) show active @endif" id="callbacks-read" role="tabpanel">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                        <tr>
                                            <th class="cell">#</th>
                                            <th class="cell">Ім'я клієнта</th>
                                            <th class="cell">Date</th>
                                            <th class="cell">Статус</th>
                                            <th class="cell"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($callbacks as $callback)
                                            <tr>
                                                <td class="cell"># {{ $callback->id }}</td>
                                                <td class="cell"><span class="truncate">{{ $callback->name }}</span></td>
                                                <td class="cell"><span>{{ $callback->created_at->format('F d Y') }}</span><span class="note">{{ $callback->created_at->format(' h:i A') }}</span></td>
                                                <td class="cell">
                                                    @if($callback->is_read)
                                                        <span class="badge bg-success">Прочитано</span>
                                                    @else
                                                        <span class="badge bg-warning">Нове</span>
                                                    @endif
                                                </td>
                                                <td class="cell">
                                                    <span class="btn-sm app-btn-secondary cursor-pointer show-callback" data-action="{{ route('admin.callbacks.show',$callback) }}"
                                                          data-id="{{ $callback->id }}">    Деталі</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div><!--//table-responsive-->

                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                        <nav class="app-pagination">
                            {{ $callbacks->withQueryString()->links("admin.section.pagination") }}
                        </nav><!--//app-pagination-->
                    </div><!--//tab-pane-->


                </div><!--//tab-content-->

            </div><!--//container-fluid-->
        </div><!--//app-content-->
    </div>
    @include('admin.callbacks.include.show-modal')
@endsection

@section('js')
    <script>
        window.onload = () => {
            var modal = $("#callbackShow");
            $(".show-callback").on('click', function () {
                $.get($(this).attr('data-action'), function (data, status) {
                    modal.find(".callback-data-name").html(data.data.name)
                    modal.find(".callback-data-phone").html(data.data.phone)
                    modal.find(".callback-data-time").html(data.data.created_at)
                    modal.find(".callback-data-service").html(null === data.data.service_id ? '' : data.data.service.name)
                    modal.find(".callback-data-description").html(data.data.comment)
                    modal.modal('show')
                });
            });

            document.getElementById('callbackShow').addEventListener('hide.bs.modal', function (event) {
                window.location.reload();
            })
            $(".copy-phone").on('click',function (){
                var range = document.createRange();
                range.selectNode(document.querySelector(".callback-data-phone"));
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(range);
                document.execCommand("copy");
                window.getSelection().removeAllRanges();
                $(this).css('background-color','#99f3b4');
                setTimeout(()=>{
                    $(this).css('background-color','#ffffff');
                },1000)
            })

        }
    </script>
@endsection
