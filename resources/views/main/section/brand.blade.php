<div class="col-lg-4">
    @if(request()->route()->named(['index']))
        <div class="brand brand-name">
            <div class="logo">
                <img src="{{ asset('build/images/main/logo.svg') }}" alt="">
            </div>
            <div class="description">
                <span>EUROFRESH</span>
                <p>cleaning</p>
            </div>
        </div>
    @else
        <a class="brand brand-name" href="{{ route('index') }}">
            <div class="logo">
                <img src="{{ asset('build/images/main/logo.svg') }}" alt="">
            </div>
            <div class="description">
                <span>EUROFRESH</span>
                <p>cleaning</p>
            </div>
        </a>
    @endif
</div>
