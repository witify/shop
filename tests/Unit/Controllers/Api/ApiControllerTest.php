<?php

namespace Tests\Unit\Controllers\Api;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiControllerTest extends TestCase
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

    /**
     * Undocumented function
     *
     * @group testing
     */
    public function test_not_authenticated()
    {
        $response = $this->get('/api/v1/user' . '?api_token=' . $this->user->api_token);
        $response->assertStatus(200);
    }
}
