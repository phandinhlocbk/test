<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_Example()
    {
        $this->assertTrue(true);
    }

    //Test Database
    public function test_Userexist()
    {
        $user = User::factory()->create();
        $this->assertModelExists($user);
    }

    public function test_Datamissing()
    {
        $this->assertDatabaseMissing('users', [
            'email' => 'sally@example.com',
        ]);
    }
}
