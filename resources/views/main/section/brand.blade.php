<div class="col-lg-4">
    @if(request()->route()->named('index'))
        <div class="brand brand-name">
            <span>EUROFRESH</span>
            <p>cleaning</p>
            <img src="build/images/main/logo.png" alt="Logo">
        </div>
    @else
        <a class="brand brand-name" href="{{ route('index') }}">
            <span>EUROFRESH</span>
            <p>cleaning</p>
            <img src="build/images/main/logo.png" alt="Logo">
        </a>
    @endif
</div>
