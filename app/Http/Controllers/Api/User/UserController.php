<?php

namespace App\Http\Controllers\Api\User;

use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email'     => 'required',
                'password'  => 'required',
            ]);

            $credentials = [
                'email'     => $request->email,
                'password'  => $request->password,
            ];

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if ($user instanceof User) {
                    $response['status'] = true;
                    $reponse['message'] = 'Success Login';
                    $response['token_type'] = 'Bearer';
                    $response['expires_id'] = 31622400;
                    $response['access_token'] = $user->createToken('Laravel Password Grant Client')->accessToken;

                    return response()->json($response, 200);
                }
            } else {
                $response['status'] = false;
                $response['message'] = 'Unauthorized';

                return response()->json($response, 401);
            }
        } catch (Throwable $t) {
            $response['status'] = false;
            $response['message'] = $t->getMessage();

            return response()->json($response, 401);
        }
    }
}
