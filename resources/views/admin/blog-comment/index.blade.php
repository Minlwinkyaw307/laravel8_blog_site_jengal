@extends('admin.layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <div class="flex w-100 mr-0">
                        <div class="col-10 px-0">
                            <h4 class="c-grey-900 mB-20">Comments</h4>
                        </div>
                        <div class="col-2 px-0">
                            <a href="{{ route('admin.blog-comment.create') }}" class="btn cur-p btn-primary w-100 ">Create New Item</a>
                        </div>
                    </div>
                    <x-blog::alert-message></x-blog::alert-message>
                    <form method="get">
                        <div class="row">
                            <x-admin::text-input
                                label="Search"
                                :value="request()->query('search')"
                                name="search"
                                placeholder="Please Enter To Search"
                                class="col-md-8"
                                :required="false"
                            ></x-admin::text-input>

                            <x-admin::select-input
                                name="blog_id"
                                label="Blog"
                                :options="$blogs"
                                :value="request()->query('blog_id')"
                                placeholder="All"
                                class="col-md-3"
                                :required="false"
                            ></x-admin::select-input>

                            <div class="col-md-1 flex flex-column justify-content-end mb-3 w-100">
                                <button type="submit" class="btn cur-p btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Blog</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Commented At</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!count($blog_comments))
                            <tr>
                                <td colspan="7">No Records Found</td>
                            </tr>
                        @endif
                        @foreach($blog_comments as $blog_comment)
                            <tr>
                                <th scope="row">{{ $blog_comment->id }}</th>
                                <td>{{ $blog_comment->name }}</td>
                                <td><a href="mailto:{{ $blog_comment->email }}">{{ $blog_comment->email }}</a></td>
                                <td><a href="{{ route('admin.blog.edit', $blog_comment->blog->id) }}">{{ $blog_comment->blog->title }}</a></td>
                                <td>{{ \Illuminate\Support\Str::limit($blog_comment->comment, 25) }}</td>
                                <td>{{ \Illuminate\Support\Carbon::parse($blog_comment->created_at)->format('d-m-Y') }}</td>
                                <td>
                                    <form class="d-inline-block" action="{{ route('admin.blog-comment.destroy', $blog_comment->id) }}" method="post"
                                          onsubmit="return confirm('Are you sure? You want to delete selected comment?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn cur-p btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('admin.blog-comment.edit', $blog_comment->id ) }}" class="btn cur-p btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $blog_comments->appends(request()->query())->links('partials.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
