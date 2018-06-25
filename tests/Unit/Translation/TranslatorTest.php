<?php

namespace Tests\Unit\Middleware;

use Config;
use Tests\TestCase;
use App\Translation\Translator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TranslatorTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        Config::set('app.locale', 'en');
        Config::set('app.fallback_locale', 'es');
        Config::set('app.locales', [
            'en' => 'English',
            'fr' => 'Français'
        ]);
    }

    public function test_locale_exists()
    {
        app()->setLocale('fr');
        $translation = Translator::get([
            'fr' => 'Bonjour',
            'en' => 'Hello',
            'es' => 'Hola'
        ]);

        $this->assertEquals($translation, 'Bonjour');
    }

    public function test_fallback_locale()
    {
        app()->setLocale('fr');
        $translation = Translator::get([
            'en' => 'Hello',
            'es' => 'Hola'
        ]);

        $this->assertEquals($translation, 'Hola');
    }

    public function test_first_result()
    {
        app()->setLocale('fr');
        $translation = Translator::get([
            'gr' => '$%?!',
            'rt' => '!!!!!'
        ]);

        $this->assertEquals($translation, '$%?!');
    }

    public function test_no_result()
    {
        app()->setLocale('fr');
        $translation = Translator::get([]);

        $this->assertEquals($translation, '');
    }
}
