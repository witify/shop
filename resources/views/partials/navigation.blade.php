<v-navbar>

    <div class="navbar-start">
    </div>

    <div class="navbar-end">

        <!-- Guest -->
        @if (Auth::guest())
        <a class="navbar-item {{ isActiveRoute('login') }}" href="/login">Login</a>
        <a class="navbar-item {{ isActiveRoute('register') }}" href="/register">Register</a>

        <!-- Auth -->
        @else
        @include('partials.account-dropdown')
        @endif

    </div>

</v-navbar>
