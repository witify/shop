@extends ('app.front.layout')

@section('body')

    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">{{ $category->name }}</h1>
            </div>
        </div>
    </section>
    
    <section class="section">
        <div class="container">

            @include('app.shop.category.breadcrumbs')

            <div class="columns is-multiline">
                @foreach ($category->children as $category)
                <div class="column is-one-quarter">
                    <a href="{{ $category->url }}" class="button is-large">{{ $category->name }}</a>
                </div>
                @endforeach
            </div>

            <hr>

            <div class="columns is-multiline">
                @foreach ($products as $product)
                <div class="column is-one-quarter">
                    <div class="card">
                        <a href="{{ $product->url }}" class="card-content ">
                            <span class="is-size-5">
                                {{ $product->name }}
                            </span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

