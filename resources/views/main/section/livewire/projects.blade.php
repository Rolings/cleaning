<div class="project">
    <div class="container">
        <div class="section-header">
            <h1>Our projects</h1>
        </div>
        <div class="row">
            @foreach($projects as $project)
                <div class="col-lg-4 col-md-6">
                    <div class="project-item">
                        <div class="project-gallery">
                            @if($project->gallery->count())
                                @foreach($project->gallery as $image)
                                    <a href="{{ $image->url }}" @if($loop->index) style="display: none;" @endif data-lightbox="portfolio-project-{{ $project->id }}">
                                        <img class="img-fluid" src="{{ $image->url }}">
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <span class="project-title p-3">{{ $project->name }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
