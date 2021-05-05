<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    public function test_user_admin_reg()
    {
        User::query()->delete();
        
        $response = $this->post('/api/register', [
            'name' => 'admin',
            'password' => 'admin',
            'password_confirmation' => 'admin',
        ]);

        $response->assertStatus(201);
    }

    public function test_get_user()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'admin',
        ]);
    }

    public function test_get_auth_user()
    {
        $response = $this->post('/api/login', [
            'name' => 'admin',
            'password' => 'admin',
        ]);
        
        $response->assertStatus(200);
    }

    public function test_validate_error()
    {
        $response = $this->post('/api/login', [
            'name' => null,
            'password' => null,
        ]);

        $response->assertStatus(302);
    }
}
