@extends('app.dev.layout')

@section('header')
<h1 class="title">Edit globals</h1>
@endsection

@section('body')
    <dev-global-form
    :model="{{ $global }}"
    ></dev-global-form>
@endsection
