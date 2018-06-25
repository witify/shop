@extends ('master')

@section('content')
    
    <v-layout-dashboard>

        <template slot="menu">
        <aside class="menu">
            <p class="menu-label">General</p>
            <ul class="menu-list">
                @include('partials.link', ['link' => '/dev', 'title' => 'Dashboard'])
                @include('partials.link', ['link' => '/dev/user', 'title' => 'Users'])
                @include('partials.link', ['link' => '/dev/logs', 'title' => 'Logs'])
            </ul>
            <p class="menu-label">Content</p>
            <ul class="menu-list">
                @include('partials.link', ['link' => '/dev/page', 'title' => 'All pages'])
                @include('partials.link', ['link' => '/dev/page/create', 'title' => 'Create a page'])
                @include('partials.link', ['link' => '/dev/global/1/edit', 'title' => 'Globals'])
            </ul>
            <p class="menu-label">Settings</p>
            <ul class="menu-list">
                @include('partials.link', ['link' => '/dev/account', 'title' => 'Account'])
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
