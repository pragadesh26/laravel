<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{

public function login(Request $request)
{
    $user = User::firstOrCreate(
        ['email' => $request->email],
        [
            'name' => $request->name ?? 'Guest',
            'password' => bcrypt($request->password ?: Str::random(10)) // store fake hashed password
        ]
    );

    $token = $user->createToken('demo-token')->plainTextToken;

    return response()->json([
        'message' => 'Login accepted (real token)',
        'user' => $user,
        'token' => $token
    ]);
}

}
