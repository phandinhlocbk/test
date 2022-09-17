<?php

namespace Tests\Feature;

// use PHPUnit\Framework\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testLoginPage()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testUserProfile()
    {
        $url = route('user.dashboard');
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                    ->get($url);
        $response->assertStatus(200);
    }

    public function testEditProfile()
    {
        $url = route('user.update.profile');
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                ->post($url, [
                    'name' => 'fusictest',
                    'email' => 'fusictest@gmail.com',
                ]);
        $response->assertRedirect(route('user.profile'));
        $this->assertDatabaseHas('users', [
                    'name' => 'fusictest',
                    'email' => 'fusictest@gmail.com',
                ]);
    }
}
