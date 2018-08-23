<?php

namespace App\Checkout;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;

class ShippingMethod implements Jsonable, Arrayable
{
    private $name;
    private $metadata;

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
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'metadata' => $this->metadata,
            'name' => $this->name
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
