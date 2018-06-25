@extends('app.dev.layout')

@section('header')
<div class="title">All pages</div>
<a href="/dev/page/create" class="button is-primary">Create a page</a>
@endsection

@section('body')

    <dev-page-list></dev-page-list>

@endsection
