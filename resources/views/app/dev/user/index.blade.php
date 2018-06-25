@extends('app.dev.layout')

@section('header')
<h1 class="title">Users</h1>
@endsection

@section('body')

    {{ $users->links() }}

    <div class="box is-paddingless">
        <table class="table is-fullwidth is-hoverable is-marginless">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td><span class="tag is-info">{{ $user->role }}</span></td>
                    <td>
                        <a href="/dev/user/login_as/{{ $user->id }}" class="button is-primary is-small">
                            <b-icon icon="account" size="is-small"></b-icon>
                            <span>Impersonate this user</span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $users->links() }}

@endsection
