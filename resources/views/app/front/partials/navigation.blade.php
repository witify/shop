<v-navbar>

    <div class="navbar-start">
                
        <div class="navbar-item has-dropdown is-hoverable">
            
            <a class="navbar-link" href="{{ $shop['categories']->first()->url }}">{{ $shop['categories']->first()->name }}</a>
            
            <div class="navbar-dropdown is-boxed">
                @foreach($shop['categories']->first()->children as $category)
                <a href="{{ $category->url() }}" class="navbar-item">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        
        <a href="{{ $shop['pages']['contact']->url() }}" class="navbar-item @if($shop['pages']['contact']->isCurrent()) is-active @endif">{{ $shop['pages']['contact']->title }}</a>
    </div>

    <div class="navbar-end">

        @include('app.front.shop.cart.navbar-item')
        
        <!-- Guest -->
        @if (Auth::guest())
        <a class="navbar-item" href="{{ $shop['pages']['login']->url() }}">{{ $shop['pages']['login']->title }}</a>
        <a class="navbar-item" href="{{ $shop['pages']['register']->url() }}">{{ $shop['pages']['register']->title }}</a>
        
        <!-- Auth -->
        @else
            @include('partials.account-dropdown')
        @endif

        @if(isset($currentPage) && $currentPage instanceof App\Model\Interfaces\IsPage)
            @include('app.front.partials.change-locale')
        @endif
        
    </div>

</v-navbar>
