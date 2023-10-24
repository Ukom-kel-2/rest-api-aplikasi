<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;
use Laravel\Passport\HasApiTokens;
use App\Models\Admin;
use App\Models\User;


class AuthController extends Controller
{
    use HasApiTokens;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function login(Request $request)
    {
        
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::admin();
    
            // Buat akses token untuk pengguna
            $accessToken = $user->createToken('authToken')->accessToken;
    
            return response()->json([
                'user' => $user,
                'access_token' => $accessToken,
            ]);
        }
    
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

}
