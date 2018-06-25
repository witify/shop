<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class GlobalModel extends Model
{
    use Cachable;

    protected $fillable = [
        'content'
    ];

    protected $table = 'globals';

    protected $casts = [
        'content' => 'array'
    ];

    /**
     * Fetch a value from its id and translate it
     *
     * @param string $id
     * @return string
     */
    public function get($id)
    {
        $value = collect($this->content)->where('id', $id)->first();
        if ($value !== null) {
            return translate($value['value']);
        }
        return null;
    }
}
