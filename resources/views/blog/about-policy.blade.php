@extends('blog.layouts.base')

@section('content')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <ul class="page-header-breadcrumb">
                        <li><a href="{{ route('blog.index') }}">Home</a></li>
                        <li>{{ $title }}</li>
                    </ul>
                    <h1>{{ $title }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    {!! $content !!}
                </div>

                <div class="col-md-4">
                    <x-blog::most-read-posts-tile :blogs="$most_read_posts"></x-blog::most-read-posts-tile>
                </div>
            </div>
        </div>
    </div>

@endsection
