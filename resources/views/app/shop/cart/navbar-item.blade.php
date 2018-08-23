<div class="navbar-item has-dropdown is-hoverable is-cart">
    <a class="navbar-link" href="{{ $shop['pages']['cart']->url() }}">
        <span class="icon">
            <i class="mdi mdi-cart"></i>
        </span>
        @if(Cart::any())
        <span class="tag is-rounded is-danger is-cart-count">
            {{ Cart::count() }}
        </span>
        @endif
    </a>
    @if(Cart::any())
    <div class="navbar-dropdown is-right is-boxed">
        @foreach(Cart::items() as $cartItem)
          <span href="#" class="navbar-item">
            <span>
            {{ $cartItem->name }}
            </span>
            <span class="tag is-rounded">
            {{ $cartItem->quantity }}
            </span>
        </span>
        @endforeach
        <hr class="navbar-divider">
        <span class="navbar-item">
            <span>Total: {{ price_format(Cart::total()) }}</span>
        </span>
    </div>
    @endif
</div>
