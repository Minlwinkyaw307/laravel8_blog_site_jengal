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
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                    <form action="{{ is_null($id) ? route('admin.blog.store') : route('admin.blog.update', $id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(!is_null($id))
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-8 offset-md-2 row">
                                <x-blog::alert-message></x-blog::alert-message>

                                <x-admin::text-input
                                    label="Title"
                                    :value="$item->title ?? old('title')"
                                    name="title"
                                    placeholder="Please Enter Title"
                                    class="col-md-12"
                                    :required="true"
                                ></x-admin::text-input>

                                <x-admin::text-input
                                    label="Content"
                                    id="content"
                                    :value="$item->content ?? old('content')"
                                    name="content"
                                    placeholder="Please Enter To Content"
                                    class="col-md-12"
                                    :textarea="true"
                                    :required="true"
                                ></x-admin::text-input>

                                <x-admin::file-input
                                    label="Thumbnail"
                                    :old="$item->thumbnailUrl"
                                    name="thumbnail"
                                    placeholder="Please Select File"
                                    type="image/*"
                                    class="col-md-12"
                                    :required="is_null($id) ? true : false"
                                ></x-admin::file-input>

                                <x-admin::file-input
                                    label="Image"
                                    :old="$item->imageUrl"
                                    name="image"
                                    placeholder="Please Select File"
                                    type="image/*"
                                    class="col-md-12"
                                    :required="is_null($id) ? true : false"
                                ></x-admin::file-input>

                                <x-admin::select-input
                                    name="category_id"
                                    label="Blog Category"
                                    :options="$categories"
                                    :value="$item->category_id ?? old('category_id')"
                                    placeholder="Please Select Category"
                                    class="col-md-12"
                                    :required="true"
                                ></x-admin::select-input>

                                <x-admin::select-input
                                    name="blog_status_id"
                                    label="Status"
                                    :options="$blog_statuses"
                                    :value="$item->blog_status_id ?? old('blog_status_id')"
                                    placeholder="Please Select Blog Status"
                                    class="col-md-12"
                                    :required="true"
                                ></x-admin::select-input>

                                <x-admin::text-input
                                    label="Publishing Date"
                                    type="datetime-local"
                                    :value="$item->published_at ? \Illuminate\Support\Carbon::parse($item->published_at)->format('Y-m-d\TH:i') : old('published_at')"
                                    name="published_at"
                                    placeholder="Please Enter To Content"
                                    class="col-md-12"
                                    :required="false"
                                ></x-admin::text-input>

                                <x-admin::select-input
                                    name="is_featured"
                                    label="Is Featured?"
                                    :options="['0' => 'No', '1' => 'Yes']"
                                    :value="$item->is_featured ?? old('is_featured')"
                                    placeholder="Please Select Option"
                                    class="col-md-12"
                                    :required="true"
                                ></x-admin::select-input>

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

@section('bb-javascript')
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
