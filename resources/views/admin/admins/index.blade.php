@extends('layouts.admin')
@section('title', 'Адміністратори')

@section('content')
    @include('admin.section.header')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Адміністратори</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                                <div class="col-auto">
                                    <a class="btn app-btn-primary" href="{{ route('admin.services.create') }}">
                                        Додати адміністратора
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
                                    <th class="cell">Ім'я</th>
                                    <th class="cell">Телефон</th>
                                    <th class="cell">Email</th>
                                    <th class="cell">Статус</th>
                                    <th class="cell"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($admins as $admin)
                                        <tr>
                                            <td class="cell">#{{ $admin->id }}</td>
                                            <td class="cell">{{ $admin->fullName }}</td>
                                            <td class="cell"><span></span><span class="note">{{ $admin->phone }}</span></td>
                                            <td class="cell"><span></span><span class="note">{{ $admin->email }}</span></td>
                                            <td class="cell"><span class="badge bg-success">Paid</span></td>
                                            <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->

                    </div><!--//app-card-body-->
                </div><!--//app-card-->

                {{ $admins->withQueryString()->links("admin.section.pagination") }}


            </div><!--//container-fluid-->
        </div><!--//app-content-->
    </div>
@endsection
