<div class="post post-thumb">
    <a class="post-img" href="{{ route('blog.blog_view', $blog->slug) }}"><img src="{{ $blog->thumbnailUrl }}" alt=""></a>
    <div class="post-body">
        <div class="post-meta">
            <a class="post-category" style="background-color: #{{ $blog->category->color }}" href="">{{ $blog->category->name }}</a>
            <span class="post-date">{{ Carbon\Carbon::parse($blog->published_at)->diffForHumans()  }}</span>
        </div>
        <h3 class="post-title"><a href="{{ route('blog.blog_view', $blog->slug) }}">{{ $blog->title }}</a></h3>
    </div>
</div>
