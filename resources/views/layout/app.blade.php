<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"></html>
<head>
    <meta charset="UTF-8">
    {{-- 防止浏览器切换到兼容视图 --}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--  理解为移动设备显示优化 --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'LaraBBS') - Laravel 进阶教程</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="{{ route_class() }}-page">
        @include('layout._header');

        <div class="container">
            @yield('content')
        </div>

        @include('layout._footer')
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>