<div class="story">
    <div class="container">
        <div class="section-header">
            <p>Company Story</p>
            <h2>Learn About Our Journey</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="story-container">
                    <div class="story-end">
                        <p>Now</p>
                    </div>
                    <div class="story-continue">
                        @foreach($history->forget($history->count()-1) as $item)

                            @if(($loop->index+1) % 2 == 0)
                                <div class="row story-left">
                                    <div class="col-md-6 d-md-none d-block">
                                        <p class="story-date">
                                            {{ $item->event_date_at->format('d F Y') }}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="story-box">
                                            <div class="story-text">
                                                <h3>{{ $item->title }}</h3>
                                                <p>
                                                    {{ $item->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-md-block d-none">
                                        <p class="story-date">
                                            {{ $item->event_date_at->format('d F Y') }}
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div class="row story-right">
                                    <div class="col-md-6">
                                        <p class="story-date">
                                            {{ $item->event_date_at->format('d F Y') }}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="story-box">
                                            <div class="story-text">
                                                <h3>{{ $item->title }}</h3>
                                                <p>
                                                    {{ $item->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        
                    </div>
                    <div class="story-start">
                        <p>Launch</p>
                    </div>
                    <div class="story-launch">
                        <div class="story-box">
                            <div class="story-text">
                                <h3>{{ $history->last()->title }}</h3>
                                <p>
                                    {{ $history->last()->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
