<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <!-- Basic meta attributes -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO meta attributes -->
    @include('partials.seo')

    <!-- Favicons -->
    @include('partials.favicons')

    <!-- Google Analytics -->
    @include('partials.google_analytics')

    <!-- Static styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/outdated-browser/1.1.5/outdatedbrowser.min.css" />

    <!-- Material icons -->
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/2.0.46/css/materialdesignicons.min.css">

    <!-- Dynamic styles -->
    @hasSection('style')
        @yield('style')
    @else
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @endif

</head>
<body>
    
    <!-- App Content -->
    <div id="app" class="body @hasSection('body-css-classes') @yield('body-css-classes') @endif">
        
        @yield('content')

    </div>

    <!-- Laravel variables -->
    <script>window.Laravel = {!! $_laravel !!};</script>

    <!-- Outdated browser -->
    @include('partials.outdated_browser')

    <!-- Socket.io -->
    <!-- <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script> -->

    <!-- Polyfill -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>

    <!-- Mobile Detection -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ismobilejs/0.4.1/isMobile.min.js"></script>

    <!-- Application JS -->
    @hasSection('script')
        @yield('script')
    @else
        <script src="{{ mix('js/app.js') }}"></script>
    @endif
</body>
</html>
