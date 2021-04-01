<div class="section section-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Featured Posts</h2>
                </div>
            </div>
            @foreach($blogs as $blog)
                <div class="col-md-4">
                    <x-blog::post-bottomed-text-card :blog="$blog"></x-blog::post-bottomed-text-card>
                    @if(($loop->index + 1) % 4 === 0)
                        <div class="clearfix visible-md visible-lg"></div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

</div>
