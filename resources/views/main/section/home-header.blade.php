<div class="header home">
    <div class="container-fluid">
        <div class="header-top row align-items-center">
            @include('main.section.brand')
            <div class="col-lg-8">
                @include('main.section.topbar')
                @include('main.section.navbar')
            </div>
        </div>

        <div class="hero row align-items-center">
            <div class="col-md-7">
                <h2>Best & Trusted</h2>
                <h2><span>Cleaning</span> Service</h2>
                <p>Lorem ipsum dolor sit amet elit pretium facilisis ornare</p>
                <a class="btn" href="">Explore Now</a>
            </div>
            <div class="col-md-5">
                <div class="form">
                    <h3>Get A Quote</h3>
                    <form>
                        <input class="form-control" type="text" placeholder="Your Name">
                        <input class="form-control" type="text" placeholder="Mobile Number">
                        <div class="control-group">
                            <select class="custom-select">
                                <option selected>Choose a service</option>
                                <option value="1">House Cleaning</option>
                                <option value="2">Apartment Cleaning</option>
                                <option value="3">Office Cleaning</option>
                            </select>
                        </div>
                        <textarea class="form-control" placeholder="Comment"></textarea>
                        <button class="btn btn-block">Get A Quote</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
