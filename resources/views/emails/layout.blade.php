<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name') }}</title>

    <!-- Email Style -->
    @include('emails.partials.style')
    
</head>
<body>
    <div class="logo">
        <img src="{{ URL::to(config('app.logo')) }}" alt="{{ config('app.name') }}" width="100">
    </div>
    <div class="wrapper">
        <div class="container">

            <div class="content">
                @yield('content')
                @include('emails.partials.help')
            </div>

            @include('emails.partials.footer')
        </div>
    </div>
</body>
</html>
