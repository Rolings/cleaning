<div class="project">
    <div class="container">
        <div class="section-header">
            <p>Our Project</p>
        </div>
        <div class="row">
            @foreach($projects as $project)
                <div class="col-lg-4 col-md-6">
                    <div class="project-item">
                        <div class="project-gallery">
                            @if($project->gallery->count())
                                @foreach($project->gallery as $image)
                                    <a href="{{ $image->url  }}" data-lightbox="portfolio-project-{{ $project->id }}">
                                        <img class="img-fluid" src="{{ $image->url  }}">
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <span class="project-title" href="#">{{ $project->title }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
