@extends('app.dev.layout')

@section('header')
<h1 class="title">Create a page</h1>
@endsection

@section('body')
    <dev-page-form
    action="create"
    ></dev-page-form>
@endsection
