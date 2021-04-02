<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
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


        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600"><span>Copyright © 2017 Designed by <a
                    href="https://colorlib.com/" target="_blank"
                    title="Colorlib">Colorlib</a>. All rights reserved.</span>
        </footer>
    </div>
</div>

{{-- Bottom Top JavaScript Section --}}
@yield('bt-javascript')

<script src="{{ url('dashboard/js/') }}/custome.js"></script>
<script type="text/javascript" src="{{ url('dashboard/js/') }}/vendor.js"></script>
<script type="text/javascript" src="{{ url('dashboard/js/') }}/bundle.js"></script>

{{-- Bottom Bottom JavaScript Section --}}
@yield('bb-javascript')

</body>
</html>
