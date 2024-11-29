<div class="topbar">
    @if(!empty($contact_phone))
        <div class="topbar-col">
            <a href="tel:{{ $contact_phone }}"><i class="fa fa-phone-alt"></i>{{ $contact_phone }}</a>
        </div>
    @endif

    @if(!empty($contact_email))
        <div class="topbar-col">
            <a href="mailto:{{ $contact_email }}"><i class="fa fa-envelope"></i>{{ $contact_email }}</a>
        </div>
    @endif

    <div class="topbar-col">
        <div class="topbar-social">
            @if(!empty($contact_twitter))
                <a href="{{ $contact_twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
            @endif
            @if(!empty($contact_facebook))
                <a href="{{ $contact_facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
            @endif
            @if(!empty($contact_youtube))
                <a href="{{ $contact_youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
            @endif
            @if(!empty($contact_instagram))
                <a href="{{ $contact_instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
            @endif
            @if(!empty($contact_linkedin))
                <a href="{{ $contact_linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            @endif
        </div>
    </div>
</div>
