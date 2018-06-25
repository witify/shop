<?php

namespace Tests\Unit\Model;

use App\Page;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    private $page, $homepage;

    public function setUp()
    {
        parent::setUp();
        $this->page = factory(Page::class)->create();
        $this->homepage = factory(Page::class)->create([
            'view' => 'home',
            'slug' => [
                'en' => 'home',
                'fr' => 'accueil'
            ]
        ]);
    }

    public function test_is_homepage()
    {
        $this->assertTrue($this->homepage->isHomepage());
    }

    public function test_url()
    {
        app()->setLocale('fr');
        $this->assertEquals("/fr/{$this->page->slug}", $this->page->url());

        app()->setLocale('en');
        $this->assertEquals("/en/{$this->page->slug}", $this->page->url());
    }

    public function test_homepage_url()
    {
        app()->setLocale('fr');
        $this->assertEquals("/fr", $this->homepage->url());

        app()->setLocale('en');
        $this->assertEquals("/en", $this->homepage->url());
    }

    public function test_homepage()
    {
        $this->assertEquals($this->homepage->id, Page::homepage()->id);
    }

    public function test_is_current()
    {
        $this->get('/en');
        $this->assertTrue($this->homepage->isCurrent());

        $this->get("/en/{$this->page->slug}");
        $this->assertTrue($this->page->isCurrent());
    }
}
