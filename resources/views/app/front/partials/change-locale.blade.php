@if(isset($page) && $page instanceof App\Model\Interfaces\IsPage)

<div class="navbar-item has-dropdown is-hoverable">
    <a class="navbar-link" href="#">{{ config('app.locales')[app()->getLocale()] }}</a>
    <div class="navbar-dropdown is-right is-boxed">
        @foreach(config('app.locales') as $key => $locale)
          <a href="{{ $page->url($key) }}" class="navbar-item @if($key == app()->getLocale()) is-active @endif">{{ $locale }}</a>
        @endforeach
    </div>
</div>

@else

<div class="navbar-item has-dropdown is-hoverable">
    <a class="navbar-link" href="#">{{ config('app.locales')[app()->getLocale()] }}</a>
    <div class="navbar-dropdown is-right is-boxed">
        @foreach(config('app.locales') as $key => $locale)
          <a href="/{{ $key }}" class="navbar-item @if($key == app()->getLocale()) is-active @endif">{{ $locale }}</a>
        @endforeach
    </div>
</div>

@endif
