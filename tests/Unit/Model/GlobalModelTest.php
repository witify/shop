<?php

namespace Tests\Unit\Model;

use App\GlobalModel;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GlobalModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_method()
    {
        $global = GlobalModel::create([
            'content' => [
                [
                    'id' => 'name',
                    'value' => [
                        'en' => 'Hello World',
                        'fr' => 'Bonjour monde'
                    ]
                ]
            ]
        ]);

        app()->setLocale('fr');
        $value = $global->get('name');
        $this->assertEquals('Bonjour monde', $value);
    }

    public function test_get_method_with_invalid_id()
    {
        $global = GlobalModel::create([
            'content' => [
                [
                    'id' => 'name',
                    'value' => [
                        'en' => 'Hello World',
                        'fr' => 'Bonjour monde'
                    ]
                ]
            ]
        ]);

        app()->setLocale('fr');
        $value = $global->get('test');
        $this->assertNull($value);
    }
}
