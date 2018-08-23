<?php

namespace App\Checkout;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;

class Address implements Jsonable, Arrayable
{
    private $first_name;
    private $last_name;
    private $business_name;
    private $business_tax_id;
    private $business_id;
    private $address_1;
    private $address_2;
    private $city;
    private $zip_code;
    private $phone;
    private $phone_alt;
    private $country;
    private $state;

    /**
     * Constructor
     * 
     * @param array $data
     * @return Address
     */
    public function __construct(array $data = [])
    {
        $this->fromArray($data);   
    }

    /**
     * Build object from array
     * 
     * @param array $data
     * @return Address
     */
    public function fromArray(array $data)
    {
        foreach ($data as $name => $value) {
            $this->{$name} = $value;
        }
        return $this;
    }

    /**
     * Check if object is empty
     * 
     * @return bool
     */
    public function isEmpty() : bool
    {
        foreach ($this as $key => $value) {
            if ($value != null) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'business_name' => $this->business_name,
            'business_tax_id' => $this->business_tax_id,
            'business_id' => $this->business_id,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'city' => $this->city,
            'zip_code' => $this->zip_code,
            'phone' => $this->phone,
            'phone_alt' => $this->phone_alt,
            'country' => $this->country,
            'state' => $this->state
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
