@extends('blog.layouts.base')

@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                @for($i = 0; $i < (count($featured_posts) < 2 ? count($featured_posts): 2); $i++)
                    <div class="col-md-6">
                        <x-blog::post-text-over-card :blog="$featured_posts[$i]"></x-blog::post-text-over-card>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <x-blog::recent-posts :blogs="$recent_posts"></x-blog::recent-posts>
    <x-blog::featured-posts :blogs="$featured_posts"></x-blog::featured-posts>
    <div class="section">
        <div class="container">
            <div class="col-md-8">
                <x-blog::most-read-posts :blogs="$most_read_posts"></x-blog::most-read-posts>
                <div class="section-row">
                    <a href="{{ route('blog.blogs') }}" class="primary-button d-inline-block w-100px">Show More</a>
                </div>
            </div>
            <div class="col-md-4">
                <x-blog::post-categories :categories="$categories"></x-blog::post-categories>
            </div>
        </div>
    </div>
@endsection
