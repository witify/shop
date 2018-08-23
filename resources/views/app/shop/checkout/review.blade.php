@extends ('app.front.layout')

@section('body')

    <section class="section">
        <div class="container">

            <div class="columns">
                <div class="column">
                    <h1 class="title">Checkout</h1>

                    <div class="control">
                        <a href="{{ route('checkout', [app()->getLocale(), 'payment']) }}" class="button">
                            <span class="icon">
                                <i class="mdi mdi-arrow-left"></i>
                            </span>
                            <span>Change your payment method</span>
                        </a>
                        <a href="{{ route('checkout', [app()->getLocale(), 'success']) }}" class="button is-primary">
                            <span>Place order</span>
                            <span class="icon">
                                <i class="mdi mdi-checkbox-marked-circle-outline"></i>
                            </span>
                        </a>
                    </div>
                   
                </div>

                <div class="column">
                    <h2 class="title is-size-4">Your order</h2>
                    @include('app.shop.cart.partial')
                </div>
            </div>
        </div>
    </section>

@endsection

