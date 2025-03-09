<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        // login と register を除いたすべてのアクションに対して JWT 認証を適用
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    // ユーザー登録
    public function register(Request $request)
    {
        $user = User::create([
            "name"     => $request->name,
            "email"    => $request->email,
            "password" => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User created successfully'], 201);
    }

    // ログイン処理（JWT トークンを発行）
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        /** @var \Tymon\JWTAuth\JWTGuard $guard */
        $guard = auth();
        if (! $token = $guard->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    // 認証中のユーザー情報を返す
    public function me()
    {
        /** @var \Tymon\JWTAuth\JWTGuard $guard */
        $guard = auth();
        return response()->json($guard->user());
    }

    // ログアウト処理（トークン無効化）
    public function logout()
    {
        /** @var \Tymon\JWTAuth\JWTGuard $guard */
        $guard = auth();
        $guard->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    // トークンのリフレッシュ
    public function refresh()
    {
        /** @var \Tymon\JWTAuth\JWTGuard $guard */
        $guard = auth();
        return $this->respondWithToken($guard->refresh());
    }

    // JWT トークンをレスポンスとして返す
    protected function respondWithToken($token)
    {
        /** @var \Tymon\JWTAuth\JWTGuard $guard */
        $guard = auth();
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => $guard ->factory()->getTTL() * 60,
        ]);
    }
}
