@extends('layouts.admin')
@section('title', 'Історія')

@section('content')
    @include('admin.section.header')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Історія</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                                <div class="col-auto">
                                    <a class="btn app-btn-primary" href="{{ route('admin.history.create') }}">
                                        Додати історію
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
                                    <th class="cell">Заголовок</th>
                                    <th class="cell">Дата відображення</th>
                                    <th class="cell">Дата створення</th>
                                    <th class="cell">Дата</th>
                                    <th class="cell">Статус</th>
                                    <th class="cell"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td class="cell">#{{ $item->id }}</td>
                                        <td class="cell">{{ $item->title }}</td>
                                        <td class="cell"><span>{{ $item->event_date_at->format('F d Y') }}</span><span class="note">{{ $item->event_date_at->format(' h:i A') }}</span></td>
                                        <td class="cell"><span>{{ $item->created_at->format('F d Y') }}</span><span class="note">{{ $item->created_at    ->format(' h:i A') }}</span></td>
                                        <td class="cell">
                                            @if($item->active)
                                                <span class="badge bg-success">Активно</span>
                                            @else
                                                <span class="badge bg-warning">Неактивно</span>
                                            @endif
                                        </td>
                                        <td class="cell"><a class="btn-sm app-btn-secondary" href="{{ route('admin.history.edit',$item) }}">Редагувати</a></td>
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
