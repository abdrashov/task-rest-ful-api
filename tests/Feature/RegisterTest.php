<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;

class RegisterTest extends TestCase
{
    public function test_models_can_be_instantiated()
    {
        User::query()->delete();

        $users = User::factory(1)->create();
        $this->assertDatabaseCount('users', 1);
    }

    public function test_create_user()
    {
        $response = $this->post('/api/register', [
            'name' => 'test',
            'password' => 'admin',
            'password_confirmation' => 'admin',
        ]);

        $response->assertStatus(201);
    }

    public function test_get_user()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'test',
        ]);
    }

    public function test_not_get_user()
    {
        $this->assertDatabaseMissing('users', [
            'name' => 'adminasd',
        ]);
    }

    public function test_validate_redirect()
    {
        $response = $this->post('/api/register', [
            'password' => '12345678',
            'password_confirmation' => '124',
        ]);

        $response->assertStatus(302);
    }
}
