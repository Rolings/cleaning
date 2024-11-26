@extends('layouts.admin')
@section('title', 'Сервіси')

@section('content')
    @include('admin.section.header')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Сервіси</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <form class="docs-search-form row gx-1 align-items-center">
                                        <div class="col-auto">
                                            <input type="text" id="search-docs" name="searchdocs" class="form-control search-docs" placeholder="Search">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn app-btn-secondary">Search</button>
                                        </div>
                                    </form>

                                </div><!--//col-->
                                <div class="col-auto">

                                    <select class="form-select w-auto">
                                        <option selected="" value="option-1">All</option>
                                        <option value="option-2">Text file</option>
                                        <option value="option-3">Image</option>
                                        <option value="option-4">Spreadsheet</option>
                                        <option value="option-5">Presentation</option>
                                        <option value="option-6">Zip file</option>

                                    </select>
                                </div>
                                <div class="col-auto">
                                    <a class="btn app-btn-primary" href="{{ route('admin.services.create') }}">
                                      Додати сервіс
                                    </a>
                                </div>
                            </div><!--//row-->
                        </div><!--//table-utilities-->
                    </div><!--//col-auto-->
                </div><!--//row-->

                <div class="row g-4">

                    @foreach($items as $item)
                        <div class="col-12 col-sm-6 col-lg-4 col-md-4 col-xl-4 col-xxl-3">
                            <div class="app-card app-card-doc shadow-sm h-100">
                                <div class="app-card-thumb-holder p-3">
                                    <div class="app-card-thumb">
                                        <img class="thumb-image" src="{{ $item->image?->url }}" alt="">
                                    </div>
                                    <span class="badge bg-success"></span>
                                    <a class="app-card-link-mask" href="{{ route('admin.services.edit',$item) }}"></a>
                                </div>
                                <div class="app-card-body p-3 has-card-actions">

                                    <h4 class="app-doc-title truncate mb-0"><a href="{{ route('admin.services.edit',$item) }}">{{ $item->title }}</a></h4>
                                    <div class="app-doc-meta">
                                        <ul class="list-unstyled mb-0">
                                            <li><span class="text-muted">Created:</span> {{ $item->created_at->format('Y-m-d H:i:s') }}</li>
{{--
                                            <li><span class="text-muted">Size:</span> 512KB</li>
                                            <li><span class="text-muted">Uploaded:</span> 3 mins ago</li>--}}
                                        </ul>
                                    </div><!--//app-doc-meta-->


                                </div><!--//app-card-body-->

                            </div><!--//app-card-->
                        </div><!--//col-->
                    @endforeach



                </div><!--//row-->
                {{ $items->withQueryString()->links("admin.section.pagination") }}
            </div><!--//container-fluid-->
        </div><!--//app-content-->
    </div>
@endsection
