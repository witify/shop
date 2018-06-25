@extends('app.admin.layout')

@section('header')
<h1 class="title">Globals</h1>
@endsection

@section('body')
    <admin-global-form
    title="Edit globals"
    :model="{{ $global }}"
    ></admin-global-form>
@endsection
