<div class="navbar-item has-dropdown is-hoverable">
    <a class="navbar-link" href="#">{{ config('app.locales')[app()->getLocale()] }}</a>
    <div class="navbar-dropdown is-right is-boxed">
        @foreach(config('app.locales') as $key => $locale)
          <a href="{{ $currentPage->url($key) }}" class="navbar-item @if($key == app()->getLocale()) is-active @endif">{{ $locale }}</a>
        @endforeach
    </div>
</div>
