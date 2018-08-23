<v-navbar>

    <div class="navbar-start">
                
        @foreach($shop['categories']->first()->children as $category)
        <a href="{{ $category->url() }}" class="navbar-item">{{ $category->name }}</a>
        @endforeach
        
        <a href="{{ $shop['pages']['contact']->url() }}" class="navbar-item @if($shop['pages']['contact']->isCurrent()) is-active @endif">{{ $shop['pages']['contact']->title }}</a>
    </div>

    <div class="navbar-end">

        @include('app.shop.cart.navbar-item')
        
        <!-- Guest -->
        @if (Auth::guest())
        <a class="navbar-item" href="{{ $shop['pages']['login']->url() }}">{{ $shop['pages']['login']->title }}</a>
        <a class="navbar-item" href="{{ $shop['pages']['register']->url() }}">{{ $shop['pages']['register']->title }}</a>
        
        <!-- Auth -->
        @else
            @include('partials.account-dropdown')
        @endif
       
        @include('app.front.partials.change-locale')
        
    </div>

</v-navbar>
