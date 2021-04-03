@extends('admin.layouts.base')


@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item w-100">
            <div class="row gap-20">
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10"><h6 class="lh-1">Total Blogs</h6></div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed"><span id="sparklinedash"></span></div>
                                <div class="peer"><span
                                        class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">{{ $total_blogs }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10"><h6 class="lh-1">Total Categories</h6></div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed"><span id="sparklinedash2"></span></div>
                                <div class="peer"><span
                                        class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">{{ $total_categories }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10"><h6 class="lh-1">Unique Blog Viewed</h6></div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed"><span id="sparklinedash3"></span></div>
                                <div class="peer"><span
                                        class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">{{ $total_views }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10"><h6 class="lh-1">Total Blog Comments</h6></div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed"><span id="sparklinedash4"></span></div>
                                <div class="peer"><span
                                        class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">{{ $total_comments }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="masonry-item col-md-6">
            <div class="bgc-white p-20 bd">
                <h4 class="c-grey-900">Popular Posts</h4>
                <div class="mT-30">
                    <div class="row">
                        @foreach($popular_blogs as $blog)
                            <a href="{{ route('admin.blog.edit', $blog->id) }}" class="col-12 d-flex p-1 c-grey-100 mb-3">
                                <div class="blog pl-3 mr-3">
                                    <img src="{{ $blog->thumbnailUrl }}" alt="{{ $blog->title }}">
                                </div>
                                <div class="px-2 flex-grow-1">
                                    <p class="d-inline-block px-2 text-white"
                                       style="background-color: #{{ $blog->category->color }}">{{ $blog->category->name }}</p>
                                    <h5 class="d-block -mt-3 text-black">{{ $blog->title }}</h5>
                                    <p class="d-block text-black">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 90) }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="masonry-item col-md-6">
            <div class="bgc-white p-20 bd">
                <h4 class="c-grey-900">Recent Comments</h4>
                <div class="mT-30">
                    <div class="row px-3">
                        @foreach($recent_comments as $comment)
                            <a href="{{ route('admin.blog-comment.edit', $comment->id) }}" class="col-12 d-flex p-2 c-grey-100 mb-3 border-gray-200 border-radius-10px">
                                <div class="px-2 flex-grow-1">
                                    <h5 class="d-inline-block text-black">{{ $comment->blog->title }}</h5>
                                    <h6 class="d-block -mt-5 text-black">{{ $comment->name }}</h6>
                                    <p class="d-block text-black">{{ \Illuminate\Support\Str::limit(strip_tags($comment->comment), 90) }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
