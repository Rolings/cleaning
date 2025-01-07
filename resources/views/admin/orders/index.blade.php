@extends('layouts.admin')
@section('title', 'Замовлення')

@section('content')
    @include('admin.section.header')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Замовлення</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                                <div class="col-auto">
                                    <a class="btn app-btn-primary" href="{{ route('admin.services.create') }}">
                                        Додати замовлення
                                    </a>
                                </div>
                            </div><!--//row-->
                        </div><!--//table-utilities-->
                    </div><!--//col-auto-->
                </div><!--//row-->

                <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a class="flex-sm-fill text-sm-center nav-link @if(request()->route()->named('admin.orders.index')) active @endif" id="orders-all-tab" href="{{ route('admin.orders.index') }}"
                       role="tab">Всі</a>
                    <a class="flex-sm-fill text-sm-center nav-link @if(request()->route()->named('admin.orders.index.new')) active @endif" id="orders-new-tab" href="{{ route('admin.orders.index.new') }}"
                       role="tab">Нові</a>
                    <a class="flex-sm-fill text-sm-center nav-link @if(request()->route()->named('admin.orders.index.read')) active @endif" id="orders-read-tab" href="{{ route('admin.orders.index.read') }}"
                       role="tab">Прочитані</a>
                </nav>


                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade @if(request()->route()->named('admin.orders.index')) show active @endif" id="orders-all" role="tabpanel">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                        <tr>
                                            <th class="cell">#</th>
                                            <th class="cell">Ім'я клієнта</th>
                                            <th class="cell">Дата</th>
                                            <th class="cell">Статус</th>
                                            <th class="cell" colspan="2"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($items as $item)
                                            <tr>
                                                <td class="cell"># {{ $item->id }}</td>
                                                <td class="cell"><span class="truncate">{{ $item->name }}</span></td>
                                                <td class="cell"><span>{{ $item->created_at->format('F d Y') }}</span><span class="note">{{ $item->created_at->format(' h:i A') }}</span></td>
                                                <td class="cell">
                                                    @if($item->is_read)
                                                        <span class="badge bg-success">Прочитано</span>
                                                    @else
                                                        <span class="badge bg-warning">Нове</span>
                                                    @endif
                                                </td>
                                                <td class="cell">
                                                    <span class="btn-sm app-btn-secondary cursor-pointer show-order" data-action="{{ route('admin.orders.show',$item) }}"
                                                          data-id="{{ $item->id }}">    Деталі</span>
                                                </td>
                                                <td class="cell">
                                                    {{ html()->form('delete')->route('admin.orders.destroy', $item)->open() }}
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
                        <nav class="app-pagination">
                            {{ $items->withQueryString()->links("admin.section.pagination") }}
                        </nav><!--//app-pagination-->
                    </div><!--//tab-pane-->

                    <div class="tab-pane fade @if(request()->route()->named('admin.orders.index.new')) show active @endif" id="orders-new" role="tabpanel">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                        <tr>
                                            <th class="cell">#</th>
                                            <th class="cell">Ім'я клієнта</th>
                                            <th class="cell">Дата</th>
                                            <th class="cell">Статус</th>
                                            <th class="cell" colspan="2"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($items as $item)
                                            <tr>
                                                <td class="cell"># {{ $item->id }}</td>
                                                <td class="cell"><span class="truncate">{{ $item->name }}</span></td>
                                                <td class="cell"><span>{{ $item->created_at->format('F d Y') }}</span><span class="note">{{ $item->created_at->format(' h:i A') }}</span></td>
                                                <td class="cell">
                                                    @if($item->is_read)
                                                        <span class="badge bg-success">Прочитано</span>
                                                    @else
                                                        <span class="badge bg-warning">Нове</span>
                                                    @endif
                                                </td>
                                                <td class="cell">
                                                    <span class="btn-sm app-btn-secondary cursor-pointer show-order" data-action="{{ route('admin.orders.show',$item) }}"
                                                          data-id="{{ $item->id }}">Деталі</span>
                                                </td>
                                                <td class="cell">
                                                    {{ html()->form('delete')->route('admin.orders.destroy', [$item,'new'])->open() }}
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
                        <nav class="app-pagination">
                            {{ $items->withQueryString()->links("admin.section.pagination") }}
                        </nav><!--//app-pagination-->
                    </div><!--//tab-pane-->

                    <div class="tab-pane fade @if(request()->route()->named('admin.orders.index.read')) show active @endif" id="orders-read" role="tabpanel">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                        <tr>
                                            <th class="cell">#</th>
                                            <th class="cell">Ім'я клієнта</th>
                                            <th class="cell">Дата</th>
                                            <th class="cell">Статус</th>
                                            <th class="cell" colspan="2"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($items as $item)
                                            <tr>
                                                <td class="cell"># {{ $item->id }}</td>
                                                <td class="cell"><span class="truncate">{{ $item->name }}</span></td>
                                                <td class="cell"><span>{{ $item->created_at->format('F d Y') }}</span><span class="note">{{ $item->created_at->format(' h:i A') }}</span></td>
                                                <td class="cell">
                                                    @if($item->is_read)
                                                        <span class="badge bg-success">Прочитано</span>
                                                    @else
                                                        <span class="badge bg-warning">Нове</span>
                                                    @endif
                                                </td>
                                                <td class="cell">
                                                    <span class="btn-sm app-btn-secondary cursor-pointer show-order" data-action="{{ route('admin.orders.show',$item) }}"
                                                          data-id="{{ $item->id }}">    Деталі</span>
                                                </td>
                                                <td class="cell">
                                                    {{ html()->form('delete')->route('admin.orders.destroy',[$item,'read'])->open() }}
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
                        <nav class="app-pagination">
                            {{ $items->withQueryString()->links("admin.section.pagination") }}
                        </nav><!--//app-pagination-->
                    </div><!--//tab-pane-->


                </div><!--//tab-content-->

            </div><!--//container-fluid-->
        </div><!--//app-content-->
    </div>
    @include('admin.orders.include.show-modal')
@endsection

@section('js')
    <script>
        window.onload = () => {
            var modal = $("#orderShow");
            $(".show-order").on('click', function () {
                $.get($(this).attr('data-action'), function (data, status) {
                    modal.find(".order-data-id").html(data.data.id)
                    modal.find(".order-data-name").html(data.data.first_name+' '+data.data.last_name)
                    modal.find(".order-data-phone").html(data.data.phone)
                    modal.find(".order-data-email").html(data.data.email)
                    modal.find(".order-data-time").html(data.data.created_at)
                    modal.find(".order-data-time-checkout").html(data.data.order_at)
                    modal.find(".order-data-address").html(data.data.address)
                    modal.find(".order-data-offer-name").html(data.data.offer.name)

                    let services = data.data.services[0];
                    let additionalServices = data.data.services[1];

                    for(let n in services){
                        modal.find(".js-services-list").append('<span class="m-1 badge bg-primary">'+services[n].name+'</span>')
                    }

                    for(let m in additionalServices){
                        modal.find(".js-additional-services-list").append('<span class="m-1 badge bg-success">'+additionalServices[m].name+'</span>')
                    }

                    //modal.find(".callback-data-description").html(data.data.comment)
                    modal.modal('show')
                });
            });

            document.getElementById('orderShow').addEventListener('hide.bs.modal', function (event) {
                window.location.reload();
            })
            $(".copy").on('click', function () {
                var range = document.createRange();
                range.selectNode(document.querySelector('.'+$(this).attr('data-copy-field')));
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(range);
                document.execCommand("copy");
                window.getSelection().removeAllRanges();
                $(this).css('background-color', '#99f3b4');
                setTimeout(() => {
                    $(this).css('background-color', '#ffffff');
                }, 1000)
            })
        }
    </script>
@endsection
