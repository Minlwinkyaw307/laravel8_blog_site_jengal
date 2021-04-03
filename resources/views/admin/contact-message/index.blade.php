@extends('admin.layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <div class="flex w-100 mr-0">
                        <div class="col-10 px-0">
                            <h4 class="c-grey-900 mB-20">Contact Messages</h4>
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
                                class="col-md-11"
                                :required="false"
                            ></x-admin::text-input>

                            <div class="col-md-1 flex flex-column justify-content-end mb-3 w-100">
                                <button type="submit" class="btn cur-p btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Sent At</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!count($contact_messages))
                            <tr>
                                <td colspan="7">No Records Found</td>
                            </tr>
                        @endif
                        @foreach($contact_messages as $contact_message)
                            <tr>
                                <th scope="row">{{ $contact_message->id }}</th>
                                <td>{{ $contact_message->email }}</td>
                                <td>{{ $contact_message->subject }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($contact_message->message, 35) }}</td>
                                <td>{{ \Illuminate\Support\Carbon::parse($contact_message->created_at)->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.contact-message.show', $contact_message->id ) }}" class="btn cur-p btn-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $contact_messages->appends(request()->query())->links('partials.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
