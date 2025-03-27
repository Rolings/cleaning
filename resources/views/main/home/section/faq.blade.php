<div class="faqs">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-5">
                <div class="section-header left">
                    <h2>Frequently questions</h2>
                </div>
                <img src="build/images/main/faqs.jpg" alt="Image">
            </div>

            <div class="col-md-6">
                <div class="faqs">
                    <div id="accordion">
                        @foreach($questions as $item)
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapse-{{ $loop->index }}" aria-expanded="false">
                                        {!! $item->question !!}
                                    </a>
                                </div>
                                <div id="collapse-{{ $loop->index }}" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        {!! $item->answer !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="row">
                    <a href="{{ route('frequently-questions.index') }}" class="btn-global">ask a question</a>
                </div>
            </div>

        </div>
    </div>
</div>
