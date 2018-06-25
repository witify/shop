@extends('app.admin.layout')

@section('header')
<h1 class="title">Account</h1>
@endsection

@section('body')
    <v-account-settings :user="{{ Auth::user() }}"></v-account-settings>
@endsection
