<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'EstilistaWeb') }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', config('app.name', 'EstilistaWeb'))">
    <meta name="author" content="@yield('meta_author', 'SENA')">

    @yield('meta')

    @stack('before-styles')
    <link href="{{ mix('css/backoffice.css') }}" rel="stylesheet">
    @stack('after-styles')
</head>
<body>
    <div class="wrapper">
        @yield('content')
    </div>

    @stack('before-scripts')
    <script src="{{ asset('js/multicheck.js') }}"></script>
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/backoffice.js') }}"></script>
    @stack('after-scripts')
</body>
</html>
