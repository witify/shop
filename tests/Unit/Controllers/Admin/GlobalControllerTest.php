<?php

namespace Tests\Unit\Controllers\Admin;

use App\User;
use App\GlobalModel;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GlobalControllerTest extends TestCase
{
    use RefreshDatabase;

    private $user, $global;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create([
            'role' => 'admin'
        ]);
        $this->global = GlobalModel::create([
            'content' => [
                '0' => [
                    'id' => 'about',
                    'name' => [
                        'en' => 'About',
                        'fr' => 'À propos'
                    ],
                    'value' => [
                        'en' => 'About',
                        'fr' => 'À propos'
                    ]
                ]
            ],
        ]);
    }

    public function test_edit()
    {
        $global = GlobalModel::first();
        $response = $this->actingAs($this->user)->get("/admin/global/{$global->id}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('app.admin.global.edit');
        $response->assertViewHas('global', $global);
    }

    public function test_update()
    {
        $global = GlobalModel::first();
        $data = $global->toArray();
        $data['content'][0]['id'] = 'test';
        $response = $this->actingAs($this->user)->json('PATCH', "/admin/global/{$global->id}", $data);
        $response
            ->assertJson([
                'success' => true,
                'redirect' => '/admin/global/1/edit',
                'data' => null
            ]);
    }
}
