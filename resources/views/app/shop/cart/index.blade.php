@extends ('app.front.layout')

@section('body')

    <section class="section">
        <div class="container">
            <h1 class="title">
                Your cart
            </h1>
            
            @include('app.shop.cart.partial')

            <hr>

            <a href="{{ $shop['pages']['checkout']->url() }}" class="button is-primary">Go to checkout</a>

        </div>
    </section>

@endsection

