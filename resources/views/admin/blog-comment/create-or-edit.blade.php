@extends('admin.layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <div class="flex w-100 mr-0">
                        <div class="col-md-7 offset-2 px-3">
                            <h4 class="c-grey-900 mB-20">{{ $title }}</h4>
                        </div>
                        <div class="col-1">
                            <a href="{{ route('admin.blog-comment.index') }}" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                    <form action="{{ is_null($id) ? route('admin.blog-comment.store') : route('admin.blog-comment.update', $id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(!is_null($id))
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-8 offset-md-2 row">
                                <x-blog::alert-message></x-blog::alert-message>

                                <x-admin::text-input
                                    label="Name"
                                    :value="$item->name ?? old('name')"
                                    name="name"
                                    placeholder="Please Enter Name"
                                    class="col-md-12"
                                    :required="true"
                                ></x-admin::text-input>

                                <x-admin::text-input
                                    label="Email"
                                    type="email"
                                    :value="$item->email ?? old('email')"
                                    name="email"
                                    placeholder="Please Enter Email"
                                    class="col-md-12"
                                    :required="true"
                                ></x-admin::text-input>

                                <x-admin::text-input
                                    label="Website"
                                    :value="$item->website ?? old('website')"
                                    name="website"
                                    placeholder="Please Enter Website Link"
                                    class="col-md-12"
                                    :required="false"
                                ></x-admin::text-input>

                                <x-admin::text-input
                                    label="Comment"
                                    id="comment"
                                    :value="$item->comment ?? old('comment')"
                                    name="comment"
                                    placeholder="Please Enter Comment"
                                    class="col-md-12"
                                    :textarea="true"
                                    :required="true"
                                ></x-admin::text-input>

                                <x-admin::select-input
                                    name="blog_id"
                                    label="Blog"
                                    :options="$blogs"
                                    :value="$item->blog_id ?? old('blog_id')"
                                    placeholder="Please Select A Blog"
                                    class="col-md-12"
                                    :required="true"
                                >
                                    <a href="{{ route('admin.blog.create') }}">Create New Blog</a>
                                </x-admin::select-input>

                                <div class="col-md-2 offset-md-10">
                                    <button class="btn cur-p btn-primary w-100">{{ is_null($id) ? 'Submit' : 'Update' }}</button>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

