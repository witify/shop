@extends('app.admin.layout')

@section('header')
<h1 class="title">Dashboard</h1>
@endsection

@section('body')

    <div class="columns">
        <a href="/admin/page" class="column">
            <div class="button is-pad">
                <b-icon icon="book-open-page-variant" size="is-medium"></b-icon>
                <span class="text">Pages</span>
            </div>
        </a>
        <a href="/admin/global/1/edit" class="column">
            <div class="button is-pad">
                <b-icon icon="earth" size="is-medium"></b-icon>
                <span class="text">Globals</span>
            </div>
        </a>
    </div>

@endsection
