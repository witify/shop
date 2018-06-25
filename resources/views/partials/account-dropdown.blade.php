<div class="navbar-item has-dropdown is-hoverable">
    <a href="/{{ Auth::user()->role }}" class="navbar-link is-account">
        <div class="icon">
            <i class="mdi mdi-account-circle"></i>
        </div>
    </a>
    <div class="navbar-dropdown is-boxed is-right">
        <a href="/{{ Auth::user()->role }}" class="navbar-item">
            <b-icon icon="account" class="is-left" size="is-small"></b-icon>
            <span>Your account</span>
        </a>
        <a href="/{{ Auth::user()->role }}/account" class="navbar-item">
            <b-icon icon="settings" class="is-left" size="is-small"></b-icon>
            <span>Settings</span>
        </a>
        <hr class="navbar-divider">
        <a href="#" class="navbar-item" @click.prevent="$logout()">
            <b-icon icon="logout" class="is-left" size="is-small"></b-icon>
            <span>Logout</span>
        </a>
    </div>
</div>