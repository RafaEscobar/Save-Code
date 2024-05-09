<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

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
}
