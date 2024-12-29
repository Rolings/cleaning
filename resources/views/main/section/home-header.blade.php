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
            </div>
            <div class="col-md-5">
                <div class="form">
                    <h3>Quick order</h3>
                    {{ html()->form()->route('checkout')->open() }}
                    {{ html()->text('name')->required()->placeholder('Your Name')->attributes(['id'=>'name','class'=>'form-control']) }}
                    {{ html()->text('phone')->required()->placeholder('Mobile Number')->attributes(['id'=>'phone','class'=>'form-control']) }}
                    <div class="control-group">
                        {{ html()->select('offer_id',$offers->pluck('name','id'))->required()->attributes(['id'=>'offer_id','class'=>'custom-select']) }}
                    </div>
                    {{ html()->textarea('description')->attributes(['id'=>'description','class'=>'form-control','cols'=>'100','rows'=>'30','style'=>'height:100px;']) }}

                    <button class="btn btn-block">Book now</button>
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div>
</div>
