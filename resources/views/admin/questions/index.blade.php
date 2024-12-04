@extends('layouts.admin')
@section('title', 'Часті питання')

@section('content')
    @include('admin.section.header')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Часті питання</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                                <div class="col-auto">
                                    <a class="btn app-btn-primary" href="{{ route('admin.questions.create') }}">
                                        Додати питання
                                    </a>
                                </div>
                            </div><!--//row-->
                        </div><!--//table-utilities-->
                    </div><!--//col-auto-->
                </div><!--//row-->

                @foreach($items as $item)
                    <div class="app-card app-card-notification shadow-sm mb-4">
                        <div class="app-card-header px-4 py-3">
                            <div class="row g-3 align-items-center">
                                <div class="col-12 col-lg-auto text-center text-lg-start">
                                    <h4 class="notification-title mb-1">{{ $item->question }}</h4>
                                    @if($item->top)
                                        <div class="notification-type mb-2">
                                            @if($item->active)
                                                <span class="badge bg-success">Активно</span>
                                            @else
                                                <span class="badge bg-warning">Неактивно</span>
                                            @endif
                                            <span class="badge bg-warning">Топ</span>
                                        </div>
                                    @endif
                                    <ul class="notification-meta list-inline mb-0">
                                        <li class="list-inline-item">{{ $item->created_at->format('d.m.Y h:i A') }}</li>
                                        <li class="list-inline-item">|</li>
                                        <li class="list-inline-item">{{ $item->name }}</li>
                                    </ul>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body p-4">
                            <div class="notification-content">
                                {{ $item->answer }}
                            </div>
                        </div><!--//app-card-body-->
                        <div class="app-card-footer px-4 py-3 col-12 pb-5">
                            <div class="float-start">
                                {{ html()->form('put')->route('admin.questions.destroy', $item)->open() }}
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn app-btn-danger">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd"
                                                  d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                        Видалити
                                    </button>
                                {{ html()->form()->close() }}
                            </div>
                            <div class="float-end">
                                <a class="action-link" href="{{ route('admin.questions.edit', $item)  }}">Редагувати
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right ms-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                    </svg>
                                </a>
                            </div>

                        </div><!--//app-card-footer-->
                    </div>
                @endforeach

                {{ $items->withQueryString()->links("admin.section.pagination") }}

            </div><!--//container-fluid-->
        </div><!--//app-content-->
    </div>
@endsection
