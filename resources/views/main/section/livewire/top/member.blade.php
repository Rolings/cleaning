<div class="team">
    <div class="container-fluid p-0">
        <div class="section-header">
            <p>Top Member</p>
        </div>
        <div class="row">
            @foreach($items as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ $item->avatarUrl }}" alt="Team Image">
                        </div>
                        <div class="team-text">
                            <h2>{{ $item->fullName }}</h2>
                            <h3>{{ $item->name }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
