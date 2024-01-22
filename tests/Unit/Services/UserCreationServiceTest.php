<?php

namespace Tests\Unit\Services;

use App\Models\User;
use App\Services\Users\UserCreationService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mockery;
use PHPUnit\Framework\TestCase;

class UserCreationServiceTest extends TestCase
{

    /** @test
     * @throws Exception
     */
    public function test_creates_a_user()
    {
        $userData = ['email' => 'john.doe@example.com'];
        $password = 'secret';
        $userMock = Mockery::mock(User::class);

        Hash::shouldReceive('make')->once()->with($password)->andReturn('hashed_passsword');
        DB::shouldReceive('transaction')->once()->with(Mockery::type('callable'))->andReturn($userMock);

        $service = new UserCreationService($userMock);
        $service->setData($userData);
        $service->setPassword($password);

        $result = $service->handle();

        $this->assertInstanceOf(User::class, $result);
    }

    public function test_handle_failure_exception()
    {
        $password = 'secret';

        $userMock = Mockery::mock(User::class);

        Hash::shouldReceive('make')->once()->with($password)->andReturn('hashed_passsword');
        DB::shouldReceive('transaction')
            ->once()
            ->with(Mockery::type('callable'))
            ->andThrow(new Exception("Teste"));

        $service = new UserCreationService($userMock);

        $this->expectException(Exception::class);
        $service->handle();
    }
}
