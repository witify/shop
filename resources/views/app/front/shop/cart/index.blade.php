@extends ('app.front.layout')

@section('body')

    <section class="section">
        <div class="container">
            <h1 class="title">
                Your cart
            </h1>
            
            <table class="table">
                @foreach(Cart::items() as $item)
                <tr>
                    <th>
                        {{ $item->name }}
                        @foreach($item->options as $option)
                            <span class="tag">{{ $option }}</span>
                        @endforeach
                    </th>
                    <th>
                        <span>
                            {{ price_format($item->total()) }}
                        </span>
                        <span class="is-size-7">
                            {{ price_format($item->price) }} x {{ $item->quantity }}
                        </span>
                    </th>
                    <th class="has-text-right">
                        <remove-from-cart row-id="{{ $item->rowId }}"></remove-from-cart>
                    </th>
                </tr>
                @endforeach
                <tr>
                    <th colspan="2">Subtotal</th>
                    <th class="has-text-right">{{ price_format(Cart::subtotal()) }}</th>
                </tr>
                @foreach(Cart::getCartLines() as $key => $line)
                <tr>
                    <th colspan="2">{{ $key }}</th>
                    <th class="has-text-right">{{ price_format($line) }}</th>
                </tr>
                @endforeach
            </table>
        </div>
    </section>

@endsection

