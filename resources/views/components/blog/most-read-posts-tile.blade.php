<div>
    <div class="aside-widget">
        <div class="section-title">
            <h2>Most Read</h2>
        </div>
        @foreach($blogs as $blog)
            <div class="post post-widget">
                <a class="post-img" href="{{ route('blog.blog_view', $blog->slug) }}"><img
                        style="max-width: 90px; max-height: 90px; object-fit: cover;" src="{{ $blog->thumbnailUrl }}"
                        alt="{{ $blog->title }}"></a>
                <div class="post-body">
                    <h3 class="post-title"><a href="{{ route('blog.blog_view', $blog->slug) }}">{{ $blog->title }}</a>
                    </h3>
                </div>
            </div>
        @endforeach
    </div>
</div>

