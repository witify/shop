@extends ('app.front.layout')

@section('body')

    <section class="section">
        <div class="container">

            <div class="columns">
                <div class="column">
                    <h1 class="title">Checkout</h1>

                    <a href="{{ route('checkout', [app()->getLocale(), 'address']) }}" class="button">
                        <span>Proceed to checkout</span>
                        <span class="icon">
                            <i class="mdi mdi-arrow-right"></i>
                        </span>
                    </a>
                </div>

                <div class="column">
                    <h2 class="title is-size-4">Your order</h2>
                    @include('app.shop.cart.partial')
                </div>
            </div>
        </div>
    </section>

@endsection

