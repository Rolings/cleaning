<!-- Footer Start -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="footer-contact">
                    <h2>Get In Touch</h2>
                    @if(!empty($contact_address))
                        <p><i class="fa fa-map-marker-alt"></i>{{ $contact_address }}</p>
                    @endif

                    @if(!empty($contact_phone))
                        <p><i class="fa fa-phone-alt"></i>{{ $contact_phone }}</p>
                    @endif

                    @if(!empty($contact_email))
                        <p><i class="fa fa-envelope"></i>{{ $contact_email }}</p>
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
            <div class="col-md-6 col-lg-3">
                <div class="footer-link">
                    <h2>Useful Link</h2>
                    <a href="{{ route('about.index') }}">About Us</a>
                    <a href="{{ route('services.index') }}">Services</a>
                    <a href="{{ route('projects.index') }}">Projects</a>
                    <a href="{{ route('contact.index') }}">Contact</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="footer-link">
                    <h2>Useful Link</h2>
                    <a href="">Our Clients</a>
                    <a href="">Clients Review</a>
                    <a href="">Ongoing Project</a>
                    <a href="">Customer Support</a>
                    <a href="">FAQs</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="footer-form">
                    <h2>Stay Updated</h2>
                    <p>
                        Lorem ipsum dolor sit amet, adipiscing elit. Etiam accumsan lacus eget velit
                    </p>
                    <input class="form-control" placeholder="Email here">
                    <button class="btn">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container footer-menu">
        <div class="f-menu">
            <a href="{{ route('terms.condition') }}">Terms of use</a>
            <a href="{{ route('privacy.policy') }}">Privacy policy</a>
            <a href="{{ route('cookies') }}">Cookies</a>
            <a href="{{ route('contact.index') }}">Contact us</a>
        </div>
    </div>
</div>
<!-- Footer End -->
