@extends('app.admin.layout')

@section('header')
<h1 class="title">Edit {{ $page->title }}</h1>
@endsection

@section('body')
    <admin-page-form
    :model="{{ $page }}"
    ></admin-page-form>
@endsection
