@extends('admin.layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <div class="flex w-100 mr-0">
                        <div class="col-10 px-0">
                            <h4 class="c-grey-900 mB-20">Blogs</h4>
                        </div>
                        <div class="col-2 px-0">
                            <a href="{{ route('admin.blog.create') }}" class="btn cur-p btn-primary w-100 ">Create New Item</a>
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
                                class="col-md-5"
                                :required="false"
                            ></x-admin::text-input>

                            <x-admin::select-input
                                name="category_id"
                                label="Blog Category"
                                :options="$categories"
                                :value="request()->query('category_id')"
                                placeholder="All"
                                class="col-md-3"
                                :required="false"
                            ></x-admin::select-input>

                            <x-admin::select-input
                                name="blog_status_id"
                                label="Status"
                                :options="$blog_statuses"
                                :value="request()->query('blog_status_id')"
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
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col">Published At</th>
                            <th scope="col">View</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!count($blogs))
                            <tr>
                                <td colspan="7">No Records Found</td>
                            </tr>
                        @endif
                        @foreach($blogs as $blog)
                            <tr>
                                <th scope="row">{{ $blog->id }}</th>
                                <td>{{ $blog->title }}</td>
                                <td>
                                    <img src="{{ $blog->thumbnailUrl }}" alt="{{ $blog->title }}" style="height: 50px;">
                                </td>
                                <td>{{ $blog->user->name }}</td>
                                <td>{{ $blog->category->name }}</td>
                                <td>
                                    <span class="badge text-white" style="background-color: #{{ $blog->blog_status->color }}">{{ $blog->blog_status->name }}</span>
                                </td>
                                <td>{{ $blog->blog_views_count }}</td>
                                <td>{{ $blog->published_at ? \Illuminate\Support\Carbon::parse($blog->published_at)->format('d-m-Y') : 'Not Yet' }}</td>
                                <td>
                                    <form class="d-inline-block" action="{{ route('admin.blog.destroy', $blog->id) }}" method="post" onsubmit="return confirm('Are you sure? You want to delete selected blog?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn cur-p btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('admin.blog.edit', $blog->id ) }}" class="btn cur-p btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $blogs->appends(request()->query())->links('partials.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
