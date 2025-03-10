<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Ecommerce - @yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    @include('frontend.include.css')
</head>

<body>
@include('frontend.include.header')

    @yield('body_section')

@include('frontend.include.footer')
@include('frontend.include.script')
</body>

</html>