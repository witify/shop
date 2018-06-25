@extends ('master')

@section('content')

    <v-layout-dashboard>

        <template slot="menu">
        <aside class="menu">
            <p class="menu-label">General</p>
            <ul class="menu-list">
                @include('partials.link', ['link' => '/admin', 'title' => 'Dashboard'])
                @include('partials.link', ['link' => '/admin/page', 'title' => 'Pages'])
                @include('partials.link', ['link' => '/admin/global/1/edit', 'title' => 'Globals'])
            </ul>
            <p class="menu-label">Settings</p>
            <ul class="menu-list">
                @include('partials.link', ['link' => '/admin/account', 'title' => 'Account'])
                <li>@include('partials.logout')</li>
            </ul>
        </aside>
        </template>

        <template slot="header">
            {{ Breadcrumbs::render() }}
            @yield('header')
        </template>

        <template slot="body">
            @yield('body')
        </template>

    </v-layout-dashboard>

@endsection
