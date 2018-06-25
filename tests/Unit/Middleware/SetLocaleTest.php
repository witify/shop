<?php

namespace Tests\Unit\Middleware;

use Config;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SetLocaleTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        Config::set('app.locale', 'en');
        Config::set('app.locales', [
            'en' => 'English',
            'fr' => 'Français'
        ]);
    }

    public function test_default_locale_is_config()
    {
        $this->get('/login');
        $this->assertEquals(app()->getLocale(), config('app.locale'));
    }

    public function test_persistant_locale_in_session()
    {
        $this->get('/login');
        $this->assertEquals(app()->getLocale(), config('app.locale'));

        session(['locale' => 'fr']);

        $this->get('/login');
        $this->assertEquals(app()->getLocale(), 'fr');
    }

    public function test_locale_from_url()
    {
        $this->get('/en');
        $this->assertEquals(app()->getLocale(), 'en');

        $this->get('/fr');
        $this->assertEquals(app()->getLocale(), 'fr');
    }

    public function test_invalid_locale_in_url()
    {
        $response = $this->get('/es');
        $response->assertStatus(404);
    }
}
