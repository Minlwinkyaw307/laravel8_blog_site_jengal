<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WebMag HTML Template</title>

    <link href="../../../fonts.googleapis.com/css7227.css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ url('blog/') }}/css/bootstrap.min.css" />

    <link rel="stylesheet" href="{{ url('blog/') }}/css/font-awesome.min.css">

    <link type="text/css" rel="stylesheet" href="{{ url('blog/') }}/css/style.css" />


    <!--[if lt IE 9]>
    <script src="{{ url('blog/') }}/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="{{ url('blog/') }}/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        @foreach($categories as $category)
            .{{ $category->slug }} a:after {
            background-color: #{{ $category->color }};
        }
        @endforeach

    </style>
    @yield('stylesheet')
</head>
<body>

<x-blog::navbar :categories="$categories"></x-blog::navbar>

@yield('content')

<x-blog::footer></x-blog::footer>


{{-- Bottom Top JavaScript Section --}}
@yield('bt-javascript')

<script src="{{ url('blog/') }}/js/jquery.min.js"></script>
<script src="{{ url('blog/') }}/js/bootstrap.min.js"></script>
<script src="{{ url('blog/') }}/js/main.js"></script>

{{-- Bottom Bottom JavaScript Section --}}
@yield('bb-javascript')

</body>

</html>
