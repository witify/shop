@extends ('app.front.layout')

@section('body')

    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">{{ $product->name }}</h1>
                <h2 class="subtitle">
                    <a href="{{ $product->category->url }}">
                        {{ $product->category->name }}
                    </a>
                </h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            
            <product-cart :product="{{ $product }}"></product-cart>

            <p>{{ $product->description }}</p>
        </div>
    </section>

@endsection

