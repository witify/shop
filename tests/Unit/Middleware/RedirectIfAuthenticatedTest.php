<?php

namespace Tests\Unit\Middleware;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RedirectIfAuthenticatedTest extends TestCase
{
    public function test_not_authenticated()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_authenticated()
    {
        $user = factory(User::class)->create([
            'role' => 'dev'
        ]);

        $response = $this->actingAs($user)
                         ->get('/login');

        $response->assertRedirect('/dev');
    }
}
