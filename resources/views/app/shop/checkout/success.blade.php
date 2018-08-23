@extends ('app.front.layout')

@section('body')

    <section class="section">
        <div class="container">

            <div class="columns">
                <div class="column">
                    <h1 class="title">Success!</h1>
                </div>

                <div class="column">
                    <h2 class="title is-size-4">Your order</h2>
                    @include('app.shop.cart.partial')
                </div>
            </div>
        </div>
    </section>

@endsection

