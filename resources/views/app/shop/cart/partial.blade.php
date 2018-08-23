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

<div class="field is-grouped">
    <div class="control">
        <form action="/cart/coupon" method="post">
            {!! csrf_field() !!}

                <div class="field">
                    <input type="text" class="input" name="coupon" placeholder="Coupon code">
                    @if($errors->any())
                    <p class="help is-danger">{{ $errors->first() }}</p>
                    @endif
                </div>
        </form>
    </div>

    @if(Cart::getMetaData('coupon_code'))
    <div class="control">
        <form action="/cart/coupon" method="post">
            {!! csrf_field() !!}
            {!! method_field('delete') !!}
            <button class="button">
                <span class="icon">
                    <i class="mdi mdi-close"></i>
                </span>
                <span>Remove coupon '{{ Cart::getMetaData('coupon_code') }}'</span>
            </button>
        </form>
    </div>
    @endif

</div>
