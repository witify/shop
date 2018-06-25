@extends('app.dev.layout')

@section('header')
<h1 class="title">Edit a page</h1>
@endsection

@section('body')
    <dev-page-form
    action="edit"
    :model="{{ $page }}"
    ></dev-page-form>
@endsection
