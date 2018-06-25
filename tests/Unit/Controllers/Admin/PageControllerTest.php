<?php

namespace Tests\Unit\Controllers\Admin;

use App\Page;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageControllerTest extends TestCase
{
    use RefreshDatabase;

    private $user, $pages;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create([
            'role' => 'admin'
        ]);
        $this->pages = factory(Page::class, 20)->create();
    }

    public function test_index()
    {
        $response = $this->actingAs($this->user)->get('/admin/page');
        $response->assertStatus(200);
        $response->assertViewIs('app.admin.page.index');
    }

    public function test_edit()
    {
        $page = Page::first();
        $response = $this->actingAs($this->user)->get("/admin/page/{$page->id}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('app.admin.page.edit');
        $response->assertViewHas('page', $page);
    }

    public function test_update()
    {
        $page = Page::first();
        $page->title = 'Test updated title';
        $response = $this->actingAs($this->user)->json('PATCH', "/admin/page/{$page->id}", $page->toArray());
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'redirect' => '/admin/page',
                'data' => null
            ]);
        $this->assertEquals(Page::first()->title, 'Test updated title');
    }
}
