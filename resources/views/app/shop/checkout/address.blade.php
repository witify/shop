@extends ('app.front.layout')

@section('body')

    <section class="section">
        <div class="container">

            <div class="columns">
                <div class="column">
                    <h1 class="title">Checkout</h1>

                    <h2 class="title is-size-5">Shipping address</h2>
                    <address-form></address-form>

                    <br>

                    <h2 class="title is-size-5">Billing address</h2>
                    <address-form></address-form>
                    
                    <br>

                    <div class="control">
                        <a href="{{ route('checkout', [app()->getLocale(), 'start']) }}" class="button">
                            <span class="icon">
                                <i class="mdi mdi-arrow-left"></i>
                            </span>
                            <span>Go back</span>
                        </a>
                        <a href="{{ route('checkout', [app()->getLocale(), 'shipping']) }}" class="button is-primary">
                            <span>Shipping method</span>
                            <span class="icon">
                                <i class="mdi mdi-arrow-right"></i>
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

