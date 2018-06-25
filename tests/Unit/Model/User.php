<?php

namespace Tests\Unit\Model;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create([
            'role' => 'sniper'
        ]);
    }

    public function test_has_role()
    {
        $this->assertTrue($this->user->hasRole('sniper'));
    }
}
