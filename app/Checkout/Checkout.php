<?php

namespace App\Checkout;

use App\Checkout\Order;
use Witify\LaravelCart\Contracts\Buyable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;

class Checkout implements Jsonable, Arrayable
{
    private $step;
    private $order;

    const STEPS = [
        'start',
        'address',
        'shipping',
        'payment',
    ];

    const SESSION_PREFIX = 'checkout';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->step = self::STEPS[0];
        $this->order = new Order;

        $this->save();
    }

    private function save()
    {
        session([self::SESSION_PREFIX => $this->toArray()]);
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'order' => $this->items->toArray(),
            'step' => $this->step
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
