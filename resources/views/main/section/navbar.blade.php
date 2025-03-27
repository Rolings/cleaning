<div class="navbar navbar-expand-lg bg-light navbar-light">
    <a href="#" class="navbar-brand">MENU</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav ml-auto">
            <a href="{{ route('index') }}" class="nav-item nav-link @if(request()->route()->named('index')) active @endif">Home</a>

            <a href="{{ route('services.index') }}" class="nav-item nav-link @if(request()->route()->named(['services.index','services.show'])) active @endif">Services</a>
            <a href="{{ route('projects.index') }}" class="nav-item nav-link @if(request()->route()->named('projects.index')) active @endif">Projects</a>
            <a href="{{ route('about.index') }}" class="nav-item nav-link @if(request()->route()->named('about.index')) active @endif">About</a>
            <a href="{{ route('contact.index') }}" class="nav-item nav-link @if(request()->route()->named('contact.index')) active @endif">Contact</a>
            <a href="{{ route('frequently-questions.index') }}" class="nav-item nav-link @if(request()->route()->named('frequently-questions.index')) active @endif">FAQ</a>
            @if(!request()->route()->named('checkout'))
                <a href="{{ route('cart') }}" class="btn">Free estimate</a>
            @endif
        </div>
    </div>
</div>
