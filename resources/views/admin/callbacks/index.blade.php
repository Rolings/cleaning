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
                                    {{--                <a class="btn app-btn-primary" href="{{ route('admin.services.create') }}">
                                                        Додати адміністратора
                                                    </a>--}}
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
                                            <th class="cell">Телефон</th>
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
                                                <td class="cell">{{ $callback->phone }}</td>
                                                <td class="cell"><span>{{ $callback->created_at->format('F d Y') }}</span><span class="note">{{ $callback->created_at->format(' h:i A') }}</span></td>
                                                <td class="cell">
                                                    @if($callback->is_read)
                                                        <span class="badge bg-success">Прочитано</span>
                                                    @else
                                                        <span class="badge bg-warning">Нове</span>
                                                    @endif
                                                </td>
                                                <td class="cell">
                                                    <span class="btn-sm app-btn-secondary pointer-event show-callback" data-id="{{ $callback->id }}" data-bs-toggle="modal" data-bs-target="#callbackShow" >    View</span>
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
                                            <th class="cell">Телефон</th>
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
                                                <td class="cell">{{ $callback->phone }}</td>
                                                <td class="cell"><span>{{ $callback->created_at->format('F d Y') }}</span><span class="note">{{ $callback->created_at->format(' h:i A') }}</span></td>
                                                <td class="cell">
                                                    @if($callback->is_read)
                                                        <span class="badge bg-success">Прочитано</span>
                                                    @else
                                                        <span class="badge bg-warning">Нове</span>
                                                    @endif
                                                </td>
                                                <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
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
                                            <th class="cell">Телефон</th>
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
                                                <td class="cell">{{ $callback->phone }}</td>
                                                <td class="cell"><span>{{ $callback->created_at->format('F d Y') }}</span><span class="note">{{ $callback->created_at->format(' h:i A') }}</span></td>
                                                <td class="cell">
                                                    @if($callback->is_read)
                                                        <span class="badge bg-success">Прочитано</span>
                                                    @else
                                                        <span class="badge bg-warning">Нове</span>
                                                    @endif
                                                </td>
                                                <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
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
        var modal = document.getElementById('callbackShow');
        window.onload = () =>{

            $(".show-callback").on('click',function (){

                myModal.show(modalToggle)
                console.log('123')
            })
        }
    </script>
@endsection
