<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {!! $head ?? '' !!}

    <link rel="icon" type="image/png" href="{{ url(asset('backend/assets/images/favicon.png')) }}"/>


    <link href="https://fonts.googleapis.com/css?family=Miriam+Libre:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ url(mix('web/assets/css/vendor.css')) }}">
    <link rel="stylesheet" href="{{ url(mix('web/assets/css/style.css')) }}">
    @yield('stylesheet')

    <script src="{{ url(mix('web/assets/js/modernizr.js')) }}"></script>

    <!--[if lt IE 9]>
    <script src="{{ url(mix('web/assets/js/respond.js')) }}"></script>
    <![endif]-->

</head>
<body>

<div class="fh5co-loader"></div>

<div id="page">

    @include('web.includes.header')

    @yield('content')

    @include('web.includes.footer')
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<script src="{{ url(mix('web/assets/js/vendor.js')) }}"></script>
<script src="{{ url(mix('web/assets/js/main.js')) }}"></script>
@yield('scripts')

</body>
</html>