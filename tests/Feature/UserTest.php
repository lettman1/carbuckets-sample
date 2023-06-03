<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function test_login_redirect_to_dashboard_successfully()
    {
        User::factory()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@test.com',
            'password' => 'password',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }

    public function test_auth_user_can_access_dashboard()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);
    }

    public function test_unauth_user_cannot_access_dashboard()
    {
        $response = $this->get('/home');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_user_is_not_auth_by_default()
    {
        $user = User::factory()->create([
            'email' => 'useradmindefault@test.com',
            'password' => bcrypt('password'),
        ]);

        $this->assertEquals(0, $user->is_admin);
    }

    public function test_user_is_role_user_by_default()
    {
        $user = User::factory()->create([
            'email' => 'userroledefault@test.com',
            'password' => bcrypt('password'),
        ]);
        
        $this->assertEquals('3', $user->role_id);
    }
}
