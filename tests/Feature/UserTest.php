<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_login_screen(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_register_screen(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_register(): void
    {
        $testData = [
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'address' => 'Test Address',
        ];

        $response = $this->post('/register', $testData);

        $response->assertRedirect('/');
    }
}
