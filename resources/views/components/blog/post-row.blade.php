<div class="post post-row">
    <a class="post-img" href="{{ route('blog.blog_view', $blog->slug) }}"><img src="{{ $blog->thumbnailUrl  }}" alt=""></a>
    <div class="post-body">
        <div class="post-meta">
            <a class="post-category" style="background-color: #{{ $blog->category->color }}" href="category.html">{{ $blog->category->name }}</a>
            <span class="post-date">{{ Carbon\Carbon::parse($blog->published_at)->diffForHumans()  }}</span>
        </div>
        <h3 class="post-title"><a href="{{ route('blog.blog_view', $blog->slug) }}">{{ $blog->title }}</a></h3>
        <p>{{  \Illuminate\Support\Str::limit(strip_tags($blog->content), 200)}}</p>
    </div>
</div>
