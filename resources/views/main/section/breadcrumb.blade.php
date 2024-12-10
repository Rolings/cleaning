<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('index') }}">Home</a>
                @isset($breadcrumbs)
                    @foreach($breadcrumbs as $breadcrumb)
                        @if($loop->index===count($breadcrumbs)-1)
                            <span>{{ $breadcrumb['title'] }}</span>
                        @else
                            <a href="{{ route($breadcrumb['route'])  }}">{{ $breadcrumb['title'] }}</a>
                        @endif
                    @endforeach
                @else
                    <span>{{ $title }}</span>
                @endisset

            </div>
        </div>
    </div>
</div>
