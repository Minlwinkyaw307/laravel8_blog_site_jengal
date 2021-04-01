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
                <x-blog::most-read-posts></x-blog::most-read-posts>
            </div>
            <div class="col-md-4">
                <x-blog::post-categories></x-blog::post-categories>
            </div>
        </div>
    </div>
@endsection
