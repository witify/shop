<?php

namespace App\Http\Controllers\Client;

use App\Address;
use App\Http\Requests\Shop\Address\AddressRequest;

class AddressController extends ClientController
{
    public function store(AddressRequest $request)
    {
        Address::create($request->all());
        return $this->json()->success();
    }

    public function update(AddressRequest $request, Address $address)
    {
        $address->update($request->all());
        return $this->json()->success();
    }
}
