<div class="project">
    <div class="container">
        <div class="section-header">
            <p>Top Project</p>
        </div>
        <div class="row">
            @foreach($items as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="project-item">
                        <div class="project-gallery">
                            @if($item->gallery->count())
                                @foreach($item->gallery as $image)
                                    <a href="{{ $image->url  }}" @if($loop->index) style="display: none;" @endif data-lightbox="portfolio-project-{{ $item->id }}">
                                        <img class="img-fluid" src="{{ $image->url  }}">
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <span class="project-title p-3" >{{ $item->title }}</span>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <a class="btn-global" href="{{ route('projects.index') }}">Learn More</a>
        </div>
    </div>
</div>
