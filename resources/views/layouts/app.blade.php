<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"></html>
<head>
    <meta charset="UTF-8">
    {{-- 防止浏览器切换到兼容视图 --}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--  理解为移动设备显示优化 --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="@yidle('description', 'LaraBBS 爱好者社区')">

    <title>@yield('title', 'LaraBBS') - Laravel 进阶教程</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app" class="{{ route_class() }}-page">
        @include('layouts._header');

        <div class="container">
            @include('layouts._message')
            @yield('content')
        </div>

        @include('layouts._footer')
    </div>

    @if (app()->isLocal())
        @include('sudosu::user-selector')
    @endif

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>