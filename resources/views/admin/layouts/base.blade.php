<!DOCTYPE html>
<html>
<head>
    <title>{{ $title ?? 'WEBMAG | Dashboard' }}</title>

    <meta name="title" content="{{ $title ?? 'WEBMAG | Dashboard' }}">
    <meta name="description" content="{{ $description ?? 'The best place to learn programming by reading blogs' }}">
    <link href="{{ url('dashboard/css/') }}/style.css" rel="stylesheet">
    <link href="{{ url('dashboard/css/') }}/custome.css?v={{ rand(1, 100) }}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body class="app">
<div id="loader">
    <div class="spinner"></div>
</div>
<div>
    <x-admin::sidebar></x-admin::sidebar>
    <div class="page-container">
        <x-admin::navbar></x-admin::navbar>

        <main class="main-content bgc-grey-100">
            <div id="mainContent">
                @yield('content')
            </div>
        </main>


        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600"><span>
                Copyright &copy; {{ \Carbon\Carbon::now()->format('Y') }} All Rights Reserved. Created By <a
                    href="http://minlwinkyaw.com/">Min Lwin Kyaw</a>
            </span>
        </footer>
    </div>
</div>

{{-- Bottom Top JavaScript Section --}}
@yield('bt-javascript')

<script type="text/javascript" src="{{ url('dashboard/js/') }}/vendor.js"></script>
<script type="text/javascript" src="{{ url('dashboard/js/') }}/bundle.js"></script>
<script src="{{ url('dashboard/js/') }}/custome.js"></script>

{{-- Bottom Bottom JavaScript Section --}}
@yield('bb-javascript')

</body>
</html>
