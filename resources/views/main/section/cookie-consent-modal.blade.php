<div class="modal fade" id="cookie-accept-modal"  data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="cookieAcceptLabel" aria-hidden="true">
    <div class="modal-dialog cookie-accept-modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="notice d-flex justify-content-between align-items-center">
                    <div class="cookie-text">This website uses cookies to personalize content and analyse traffic in order to offer you a better experience.</div>
                    <div class="buttons d-flex flex-column flex-lg-row">
                        <a href="#a" class="btn btn-success btn-sm" data-dismiss="modal" id="acceptCookies">I accept</a>
                        <a href="{{ route('cookies.index') }}" class="btn btn-secondary btn-sm" data-dismiss="modal" id="declineCookies">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
