<?php

namespace Tests\Unit\Middleware;

use Config;
use Tests\TestCase;
use App\Translation\TranslationLoader;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TranslationLoaderTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function test_js_translation()
    {
        $trans = TranslationLoader::js();
        $trans2 = include resource_path('lang/' . app()->getLocale() . '/js.php');
        $this->assertEquals($trans, $trans2);
    }
}
