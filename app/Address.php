<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Checkout\Address as CheckoutAddress;

class Address extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'business_name',
        'business_tax_id',
        'business_id',
        'address_1',
        'address_2',
        'city',
        'zip_code',
        'phone',
        'phone_alt',
        'country',
        'state'
    ];

    public function toCheckoutAddress() : CheckoutAddress
    {
        return new Address($this->toArray());
    }
}
