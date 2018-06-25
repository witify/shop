<?php

namespace Tests\Unit\Middleware;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleTest extends TestCase
{
    public function test_authorized_url()
    {
        $user = factory(User::class)->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($user)
                         ->get('/admin');

        $response->assertStatus(200);
    }

    public function test_unauthorized_url()
    {
        $user = factory(User::class)->create([
            'role' => 'dev'
        ]);

        $response = $this->actingAs($user)
                         ->get('/admin');

        $response->assertRedirect('/dev');
    }

    public function test_without_login()
    {
        $response = $this->get('/admin');

        $response->assertRedirect('/login');
    }
}
