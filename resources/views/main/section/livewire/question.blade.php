<div class="col-md-12">
    <div class="faqs">
        <div id="accordion">
            @foreach($items as $item)
                <div class="card">
                    <div class="card-header">
                        <a class="card-link  @if(!$loop->index) collapsed @endif" data-toggle="collapse" href="#collapse-{{ $loop->index }}" aria-expanded="true">
                            <span>{{ $loop->index }}</span>{!! $item->question !!}
                        </a>
                    </div>
                    <div id="collapse-{{ $loop->index }}" class="collapse @if(!$loop->index) show @endif" data-parent="#accordion">
                        <div class="card-body">
                            {!! $item->answer !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

