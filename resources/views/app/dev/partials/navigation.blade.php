<v-navbar>

    <div slot="menu-button" class="icon is-large">
        <i class="mdi mdi-account mdi-24px"></i>
    </div>

    <div class="navbar-start">

    </div>

    <div class="navbar-end">

        <!-- Guest -->
        @if (Auth::guest())
        <a class="navbar-item {{ isActiveRoute('login') }}" href="/login">Login</a>
        <a class="navbar-item {{ isActiveRoute('register') }}" href="/register">Register</a>

        <!-- Auth -->
        @else
        <v-account-dropdown></v-account-dropdown>
        @endif

    </div>

</v-navbar>
