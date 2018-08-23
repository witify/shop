@extends ('app.front.layout')

@section('body')

    <section class="section">
        <div class="container">
            <h1 class="title">
                <a href="{{ $product->url }}">
                    {{ $product->name }}
                </a>
                <span> was added to your cart 😊</span>
            </h1>
            <a href="{{ $product->category->url }}" class="button">Continue shopping</a>
            <a href="{{ $shop['pages']['checkout']->url() }}" class="button is-primary">Go to checkout</a>
        </div>
    </section>

@endsection
