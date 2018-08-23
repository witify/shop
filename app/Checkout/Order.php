<?php

namespace App\Checkout;

use App\Checkout\Address;
use App\Checkout\PaymentMethod;
use App\Checkout\ShippingMethod;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;

class Order implements Jsonable, Arrayable
{
    private $items;
    private $price;
    private $total;
    private $shippingAddress;
    private $billingAddress;
    private $shippingMethod;
    private $paymentMethod;

    public function __construct()
    {
        $this->items = collect();
        $this->price = collect();
        $this->total = 0;
        $this->shippingAddress = new Address();  
        $this->billingAddress = new Address();
        $this->shippingMethod = new ShippingMethod();
        $this->paymentMethod = new PaymentMethod();
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'items' => $this->items->toArray(), // TODO
            'shipping_address' => $this->shippingAddress->toArray(),
            'billing_address' => $this->billingAddress->toArray(),
            'shipping_method' => $this->shippingMethod->toArray(),
            'payment_method' => $this->paymentMethod->toArray(),
        ];
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }
}
