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

@section('script')
<script src="{{ mix('js/front.js') }}"></script>
@endsection
