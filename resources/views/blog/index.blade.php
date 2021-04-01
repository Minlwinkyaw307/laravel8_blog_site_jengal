@extends('blog.layouts.base')

@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <x-blog::post-text-over-card></x-blog::post-text-over-card>
                </div>

                <div class="col-md-6">
                    <x-blog::post-text-over-card></x-blog::post-text-over-card>
                </div>
            </div>
        </div>
    </div>

    <x-blog::recent-posts></x-blog::recent-posts>
    <x-blog::featured-posts></x-blog::featured-posts>
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
