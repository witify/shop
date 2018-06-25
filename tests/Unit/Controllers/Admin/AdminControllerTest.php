<?php

namespace Tests\Unit\Controllers\Admin;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create([
            'role' => 'admin'
        ]);
    }

    public function test_not_authenticated()
    {
        $response = $this->actingAs($this->user)->get('/admin');
        $response->assertStatus(200);
        $response->assertViewIs('app.admin.index');
    }
}
