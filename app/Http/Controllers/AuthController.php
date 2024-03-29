<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Resources\AuthResource;
use App\Models\User;
use App\Services\Users\UserCreationService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Collection;

class AuthController extends Controller
{

    public function __construct(private readonly UserCreationService $userCreationService)
    { }

    /**
     * @throws Exception
     */
    public function register(RegisterUserRequest $request): JsonResponse
    {
        $this->userCreationService->setData($request->all());
        $this->userCreationService->setPassword($request->get("password"));

        $user = $this->userCreationService->handle();
        $token = $user->createToken('auth_token')->plainTextToken;
        Log::info('register user: ' . $request->email);

        return response()->json([
            'data' => [
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]
        ]);
    }

    public function login(Request $request): JsonResponse
    {
        Log::info('login user: ' . $request->email);

        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json('Unauthorized', 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken("login")->plainTextToken;

        return response()->json([
            'data' => [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user_type' => $user->userType()
            ]
        ]);
    }


}
