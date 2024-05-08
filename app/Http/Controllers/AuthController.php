<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\Resources\RegisterResource;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create(
            array_merge(
                $request->all(),
                ['password' => bcrypt($request->password)]
            )
        );
        $token = $user->createToken('auth_token')->plainTextToken();
        return new RegisterResource([
                'user' => $user,
                'token' => $token
        ]);
    }
}
