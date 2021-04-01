<div class="post post-thumb">
    <a class="post-img" href="blog-post.html"><img src="{{ url('blog/') }}/img/post-1.jpg" alt=""></a>
    <div class="post-body">
        <div class="post-meta">
            <a class="post-category" style="background-color: #{{ $blog->category->color }}" href="">{{ $blog->category->name }}</a>
            <span class="post-date">{{ Carbon\Carbon::parse($blog->published_at)->diffForHumans()  }}</span>
        </div>
        <h3 class="post-title"><a href="">{{ $blog->title }}</a></h3>
    </div>
</div>
