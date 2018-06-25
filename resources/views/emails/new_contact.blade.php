@extends('emails.layout')

@section('content')

    @component('emails.components.title')
        <h1>{{ $title }}</h1>
    @endcomponent

    @component('emails.components.section')
        @foreach($fields as $key => $content)
        <div><strong>{{ $key }}</strong></div>
        <div>{{ $content }}</div>
        <br>
        @endforeach
    @endcomponent

@endsection
