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
                            <a href="{{ route('admin.contact-message.index') }}" class="btn btn-danger">Back</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 offset-md-2 row">
                            <x-blog::alert-message></x-blog::alert-message>

                            <x-admin::text-input
                                label="Email"
                                type="email"
                                :value="$item->email ?? old('email')"
                                name="email"
                                class="col-md-12"
                                :required="true"
                                :disable="true"
                            >
                                <a href="mailto:{{ $item->email }}">Reply Back</a>
                            </x-admin::text-input>

                            <x-admin::text-input
                                label="Subject"
                                type="subject"
                                :value="$item->subject ?? old('subject')"
                                name="subject"
                                class="col-md-12"
                                :required="true"
                                :disable="true"
                            ></x-admin::text-input>

                            <x-admin::text-input
                                label="Message"
                                id="message"
                                :value="$item->message ?? old('message')"
                                name="message"
                                class="col-md-12"
                                :textarea="true"
                                :required="false"
                                :disable="true"
                            ></x-admin::text-input>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

