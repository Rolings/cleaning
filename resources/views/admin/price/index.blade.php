@extends('layouts.admin')
@section('title', 'Типи кімнат')

@section('content')
    @include('admin.section.header')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Ціни</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                                <div class="col-auto">
                                    <a class="btn app-btn-primary" href="{{ route('admin.prices.create') }}">
                                        Додати ціну
                                    </a>
                                </div>
                            </div><!--//row-->
                        </div><!--//table-utilities-->
                    </div><!--//col-auto-->
                </div><!--//row-->

                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                <tr>
                                    <th class="cell">№</th>
                                    <th class="cell">Сервіс</th>
                                    <th class="cell">Тип кімнати</th>
                                    <th class="cell">Ціна за 1 кімнату</th>
                                    <th class="cell">Ціна збільшення</th>
                                    <th class="cell" colspan="2"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td class="cell">#{{ $item->id }}</td>
                                        <td class="cell">{{ $item->service->name }}</td>
                                        <td class="cell">{{ $item->roomType->name }}</td>
                                        <td class="cell">${{ $item->price_by_unit }}</td>
                                        <td class="cell">${{ $item->price_for_next_unit }}</td>
                                        <td class="cell"><a class="btn-sm app-btn-secondary" href="{{ route('admin.prices.edit',$item) }}">Редагувати</a></td>
                                        <td class="cell">
                                            {{ html()->form('delete')->route('admin.prices.destroy', $item)->open() }}
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd"
                                                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                                Видалити
                                            </button>
                                            {{ html()->form()->close() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->

                    </div><!--//app-card-body-->
                </div><!--//app-card-->

                {{ $items->withQueryString()->links("admin.section.pagination") }}


            </div><!--//container-fluid-->
        </div><!--//app-content-->
    </div>
@endsection
