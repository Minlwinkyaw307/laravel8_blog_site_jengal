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
                    </div>
                    <form action="{{ is_null($id) ? route('admin.site-config.store') : route('admin.site-config.update', $id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(!is_null($id))
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-8 offset-md-2 row">
                                <div class="col-12">
                                    <x-blog::alert-message></x-blog::alert-message>
                                </div>

                                <x-admin::file-input
                                    label="Logo"
                                    :old="$item->logoUrl"
                                    name="logo"
                                    placeholder="Please Select File"
                                    type="image/*"
                                    class="col-md-12"
                                    :required="is_null($id) ? true : false"
                                ></x-admin::file-input>

                                <x-admin::text-input
                                    label="Facebook"
                                    :value="$item->facebook ?? old('facebook')"
                                    name="facebook"
                                    placeholder="Please Enter Facebook Link"
                                    class="col-md-12"
                                    :required="true"
                                ></x-admin::text-input>

                                <x-admin::text-input
                                    label="Twitter"
                                    :value="$item->twitter ?? old('twitter')"
                                    name="twitter"
                                    placeholder="Please Enter Twitter Link"
                                    class="col-md-12"
                                    :required="true"
                                ></x-admin::text-input>

                                <x-admin::text-input
                                    label="Google+"
                                    :value="$item->google ?? old('google')"
                                    name="google"
                                    placeholder="Please Enter Google+ Link"
                                    class="col-md-12"
                                    :required="true"
                                ></x-admin::text-input>

                                <x-admin::text-input
                                    label="GitHub"
                                    :value="$item->github ?? old('github')"
                                    name="github"
                                    placeholder="Please Enter GitHub Link"
                                    class="col-md-12"
                                    :required="true"
                                ></x-admin::text-input>

                                <x-admin::text-input
                                    label="Policy"
                                    id="policy"
                                    :textarea="true"
                                    :value="$item->policy ?? old('policy')"
                                    name="policy"
                                    placeholder="Please Enter Policy"
                                    class="col-md-12"
                                    :required="true"
                                ></x-admin::text-input>

                                <x-admin::text-input
                                    label="About"
                                    id="about"
                                    :textarea="true"
                                    :value="$item->about ?? old('about')"
                                    name="about"
                                    placeholder="Please Enter About"
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
                                    label="Phone Number"
                                    :value="$item->phone ?? old('phone')"
                                    name="phone"
                                    placeholder="Please Enter Phone"
                                    class="col-md-12"
                                    :required="true"
                                ></x-admin::text-input>

                                <x-admin::text-input
                                    label="Address"
                                    :textarea="true"
                                    :value="$item->address ?? old('address')"
                                    name="address"
                                    placeholder="Please Enter Address"
                                    class="col-md-12"
                                    :required="true"
                                ></x-admin::text-input>

                                <x-admin::text-input
                                    label="Contact Page Message"
                                    :textarea="true"
                                    :value="$item->contact_message ?? old('contact_message')"
                                    name="contact_message"
                                    placeholder="Please Enter Contact Page Message"
                                    class="col-md-12"
                                    :required="true"
                                ></x-admin::text-input>


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
        CKEDITOR.replace('about');
        CKEDITOR.replace('policy');
    </script>
@endsection
