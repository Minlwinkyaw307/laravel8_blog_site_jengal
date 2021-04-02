<div>
    @if(session()->has('error'))
        <div class="alert alert-error">
            @if(is_array(session()->get('error')))
                <ul>
                    @foreach(session()->get('error') as $message)
                        <li> {{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ session()->get('error') }}
            @endif
        </div>
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success">
            @if(is_array(session()->get('success')))
                <ul>
                    @foreach(session()->get('success') as $message)
                        <li> {{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ session()->get('success') }}
            @endif
        </div>
    @endif
</div>
