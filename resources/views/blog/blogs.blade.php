@extends('blog.layouts.base')

@section('content')
    <div class="section">
        <div class="container">
            <div class="col-md-8">
                @if(count($blogs))
                    <x-blog::most-read-posts
                        :blogs="$blogs"
                        :title="\Illuminate\Support\Str::plural('Result', count($blogs))">
                    </x-blog::most-read-posts>

                    {!! $blogs->links('blog.partials.pagination') !!}
                @else
                    <h4>No result found</h4>
                    <x-blog::most-read-posts
                        :blogs="$recent_posts"
                        title="Recent Posts">
                    </x-blog::most-read-posts>
                @endif
            </div>
            <div class="col-md-4">
                <x-blog::post-categories :categories="$categories"></x-blog::post-categories>
            </div>
        </div>
    </div>
@endsection
