<div class="col-lg-4">
    @if(request()->route()->named('index'))
        <div class="brand brand-name">
            <span>EUROFRESH</span>
            <p>cleaning</p>
        </div>
    @else
        <a class="brand brand-name" href="{{ route('index') }}">
            <span>EUROFRESH</span>
            <p>cleaning</p>
        </a>
    @endif
</div>
