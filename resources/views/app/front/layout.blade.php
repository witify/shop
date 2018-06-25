@extends ('master')

@section('style')
<link href="{{ asset('css/front.css') }}" rel="stylesheet">
@endsection

@section('content')

    @include('app.front.partials.navigation')

    <div class="wrapper">
        @yield('body')
    </div>

    @include('app.front.partials.footer')
    
@endsection
