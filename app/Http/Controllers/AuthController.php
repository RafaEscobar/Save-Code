<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create(
                array_merge(
                    $request->all(),
                    ['password' => bcrypt($request->password)]
                )
            );
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['data' => [
                'user' => $user,
                'token' => $token
            ]]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->all())) {
            return response()->json([
                'message' => 'Unauthorized',
                'status' => 'fail',
            ], 401);
        }
        $user = User::where('email', $request->email)->first();
        if (is_null($user)) {
            return response()->json([
                'message' => 'User not found',
                'status' => 'fail'
            ], 404);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([ 'data' => [
            'user' => $user,
            'token' => $token
        ]]);
    }
}
