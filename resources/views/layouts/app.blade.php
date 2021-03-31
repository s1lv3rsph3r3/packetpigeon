<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pageTitle', 'Packet Pigeon')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/styles/agate.min.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @yield('extra-styles')
</head>
<body>
<x-navbar></x-navbar>
<div class="container page-container">
    @yield('content')
</div>
<x-footer></x-footer>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/highlight.min.js"></script>
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
@yield('extra-js')
</body>
</html>
