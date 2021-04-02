@extends('blog.layouts.base')

@section('content')
    <div id="post-header" class="page-header">
        <div class="background-img" style="background-image: url('{{ $blog->imageUrl }}');"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-meta">
                        <a class="post-category cat-2" href="category.html">{{ $blog->category->name }}</a>
                        <span class="post-date">{{ Carbon\Carbon::parse($blog->published_at)->diffForHumans() }}</span>
                    </div>
                    <h1>{{ $blog->title }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="section">

        <div class="container">

            <div class="row">

                <div class="col-md-8">
                    <div class="section-row sticky-container">
                        <div class="main-post">
                            <h3>{{ $blog->title }}</h3>
                            <div class="" style="padding: 10px 0;">
                                <img class="img-responsive" alt="" src="{{ $blog->imageUrl }}">
                            </div>
                            {!! $blog->content !!}
                        </div>
                        <div class="post-shares sticky-shares">
                            <a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-envelope"></i></a>
                        </div>
                    </div>

                    <div class="section-row text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="img/ad-2.jpg" alt="">
                        </a>
                    </div>


                    <div class="section-row">
                        <div class="post-author">
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="img/author.png" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h3>{{ $blog->user->name }}</h3>
                                    </div>
                                    <p>{{ $blog->user->description }}</p>
                                    <ul class="author-social">
                                        <li><a href="{{ $blog->user->github_link }}"><i class="fa fa-github"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="section-row">
                        <div class="section-title">
                            <h2>{{ $blog->blog_comments_count }} {{ \Illuminate\Support\Str::plural('Comment', $blog->blog_comments_count) }}</h2>
                        </div>
                        <div class="post-comments">
                            @foreach($blog->blog_comments as $comment)
                                <div class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="img/avatar.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <h4>{{ $comment->name }}</h4>
                                            <span class="time">{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                        </div>
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="section-row">
                        <div class="section-title">
                            <h2>Leave a reply</h2>
                            <p>your email address will not be published. required fields are marked *</p>
                            <x-blog::alert-message></x-blog::alert-message>
                        </div>
                        <form class="post-reply" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span>Name *</span>
                                        <input class="input" type="text" name="name" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span>Email *</span>
                                        <input class="input" type="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span>Website</span>
                                        <input class="input" type="text" name="website" value="{{ old('website') }}">
                                        @error('website')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="input" name="comment" placeholder="Message">{{ old('comment') }}</textarea>
                                        @error('comment')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button class="primary-button">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="col-md-4">
                    <x-blog::most-read-posts-tile :blogs="$most_read_posts"></x-blog::most-read-posts-tile>
                    <x-blog::post-categories :categories="$categories"></x-blog::post-categories>
                </div>

            </div>

        </div>

    </div>
@endsection
