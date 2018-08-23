<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Witify\LaravelCart\Cart;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class CouponCode extends Model
{
    use Cachable;
    
    const TYPES = [
        'percentage',
        'absolute'
    ];

    protected $fillable = [
        'name',
        'type',
        'amount'
    ];
    
    /**
     * Helpers
     */

    public function rebate(float $amount) : float
    {
        if ($this->isPercentage()) {
            return $amount * $this->amount;
        }

        if ($this->isAbsolute()) {
            return $this->amount;
        }

        return 0;
    }

    public function isPercentage()
    {
        return $this->type == 'percentage';
    }

    public function isAbsolute()
    {
        return $this->type == 'absolute';
    }

    /**
     * Mutators
     */

    public function setFirstNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
}
