<?php

namespace Tests\Feature;

use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use App\Services\Users\UserCreationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Mockery\Mock;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_register_method_creates_user_and_returns_token(): void
    {
        $requestData = [
            'email' => 'teste@teste.com',
            'password' => 'password'
        ];

        $response = $this->postJson('/api/register', $requestData);
        $response->assertStatus(200);
        $this->assertEquals(1, User::count());
    }
}
