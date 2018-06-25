@extends('app.dev.layout')

@section('title')
Dev Dashboard
@endsection

@section('header')
    <h1 class="title">Dashboard</h1>
@endsection

@section('body')

    <div class="columns">
        <a href="/dev/page" class="column">
            <div class="button is-pad">
                <b-icon icon="book-open-page-variant" size="is-medium"></b-icon>
                <span class="text">Pages</span>
            </div>
        </a>
        <a href="/dev/global/1/edit" class="column">
            <div class="button is-pad">
                <b-icon icon="earth" size="is-medium"></b-icon>
                <span class="text">Globals</span>
            </div>
        </a>
        <a href="/dev/user" class="column">
            <div class="button is-pad">
                <b-icon icon="account-multiple" size="is-medium"></b-icon>
                <span class="text">Users</span>
            </div>
        </a>
        <a href="/dev/logs" target="_blank" class="column">
            <div class="button is-pad">
                <b-icon icon="android-debug-bridge" size="is-medium"></b-icon>
                <span class="text">Application logs</span>
            </div>
        </a>
    </div>

@endsection
