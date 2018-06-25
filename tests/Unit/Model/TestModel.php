<?php

namespace Tests\Unit\Model;

use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    protected $fillable = [
        'title',
        'body',
        'picture'
    ];

}
