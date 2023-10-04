<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;

class UserController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function signUp(StoreUserRequest $request)
    {
        $data = $this->authService->createUser($request);

        return response()->json([
            'message' => 'Sukses Register',
            'data' => $data
        ]);
    }
}
