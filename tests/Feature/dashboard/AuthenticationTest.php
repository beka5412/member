<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    //use RefreshDatabase;

    // public function test_login_screen_can_be_rendered()
    // {
    //     $response = $this->get('/login');

    //     $response->assertStatus(200);
    // }

    public function test_users_can_authenticate_using_the_login_screen()
    {

        $response = $this->post('/login', [
            'email' => 'owner@example.com',
            'password' => '1234',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {

        $this->post('/login', [
            'email' => 'owner@example.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
