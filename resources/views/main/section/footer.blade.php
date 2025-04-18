<!-- Footer Start -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 d-flex justify-content-center">
                <div class="footer-contact">
                    <h2>Get In Touch</h2>
                    @if(!empty($contact_address))
                        <p><i class="fa fa-map-marker-alt mr-2"></i>{{ $contact_address }}</p>
                    @endif

                    @if(!empty($contact_phone))
                        <p><i class="fa fa-phone-alt mr-2"></i> <a href="tel:{{ $contact_phone }}">{{ $contact_phone }}</a></p>
                    @endif

                    @if(!empty($contact_email))
                        <p><i class="fa fa-envelope mr-2"></i><a href="mailto:{{ $contact_email }}">{{ $contact_email }}</a></p>
                    @endif

                    <div class="footer-social">
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
            <div class="col-md-6 col-lg-4 d-flex justify-content-center">
                <div class="footer-link">
                    <h2>Service</h2>
                    @if(request()->route()->named('services.index'))
                        <span class="unlink-contact">Services</span>
                    @else
                        <a href="{{ route('services.index') }}">Services</a>
                    @endif

                    @if(request()->route()->named('projects.index'))
                        <span class="unlink-contact">Projects</span>
                    @else
                        <a href="{{ route('projects.index') }}">Projects</a>
                    @endif
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex justify-content-center">
                <div class="footer-link">
                    <h2>Contact</h2>

                    @if(request()->route()->named('about.index'))
                        <span class="unlink-contact">About</span>
                    @else
                        <a href="{{ route('about.index') }}">About</a>
                    @endif

                    @if(request()->route()->named('contact.index'))
                        <span class="unlink-contact">Contact</span>
                    @else
                        <a href="{{ route('contact.index') }}">Contact</a>
                    @endif

                    @if(request()->route()->named('reviews.index'))
                        <span class="unlink-contact">Review</span>
                    @else
                        <a href="{{ route('reviews.index') }}">Review</a>
                    @endif

                    @if(request()->route()->named('frequently-questions.index'))
                        <span class="unlink-contact active">FAQ</span>
                    @else
                        <a href="{{ route('frequently-questions.index') }}">FAQ</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container footer-menu">
        <div class="f-menu">
            @if(request()->route()->named('terms-condition.index'))
                <span class="unlink">Terms of use</span>
            @else
                <a href="{{ route('terms-condition.index') }}">Terms of use</a>
            @endif

            @if(request()->route()->named('privacy-policy.index'))
                <span class="unlink">Privacy policy</span>
            @else
                <a href="{{ route('privacy-policy.index') }}">Privacy policy</a>
            @endif

            @if(request()->route()->named('cookies.index'))
                <span class="unlink">Cookies</span>
            @else
                <a href="{{ route('cookies.index') }}">Cookies</a>
            @endif
        </div>
    </div>
</div>
@include('main.section.cookie-consent-modal')
<!-- Footer End -->
