<div class="page-header">
    <div class="container-fluid">
        <div class="row justify-content-start">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    @isset($breadcrumbs)
                        @foreach($breadcrumbs as $breadcrumb)
                            @if($loop->last)
                                <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['title'] }}</li>
                                <li><span></span></li>
                            @else
                                <li class="breadcrumb-item"><a href="{{ route($breadcrumb['route'])  }}">{{ $breadcrumb['title'] }}</a></li>
                            @endif
                        @endforeach
                    @else
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    @endisset
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="section-header mt-3 mb-2">
        <h1>{{ $title }}</h1>
    </div>
</div>
