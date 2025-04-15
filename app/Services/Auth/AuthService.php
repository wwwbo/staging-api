<?php

namespace App\Services\Auth;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $token = $user->createToken($data['name'])->plainTextToken;
        $data = [
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ];

        return responseSuccess($data, 'User created', 201);
    }

    public function login($request)
    {

        try {
            if (! Auth::attempt($request->only('email', 'password'))) {
                throw new Exception('Unauthorized');
            }

            $user = User::where('email', $request->email)->firstOrFail();
            $token = $user->createToken($user['name'])->plainTextToken;
            $data = [
                'access_token' => $token,
                'token_type' => 'Bearer'
            ];

            return responseSuccess($data, 'Login success');
        } catch (Exception $e) {
            return responseError('Please check Email and Password', $e->getMessage(), 401);
        }
    }
}
