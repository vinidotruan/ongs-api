<?php

namespace Tests\Unit;

use App\Http\Controllers\AuthController;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use App\Services\Users\UserCreationService;
use Illuminate\Http\JsonResponse;
use Mockery;
use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->userModel = Mockery::mock(User::class);
        $this->registerService = Mockery::mock(UserCreationService::class, [$this->userModel]);
    }


    public function test_register_request_ok(): void
    {
        $requestData = [
            'email' => 'teste@teste.com',
            'password' => 'password'
        ];

        $request = new RegisterUserRequest($requestData);

        $this->registerService->shouldReceive('setData')->once()->with($requestData);
        $this->registerService->shouldReceive('setPassword')->once()->with($requestData['password']);
        $this->registerService->shouldReceive('handle')->once()->andReturn(new User());

        $controller = new AuthController($this->registerService);
        $response = $controller->register($request);
        $this->assertInstanceOf(JsonResponse::class, $response);
    }

}
