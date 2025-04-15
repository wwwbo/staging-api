<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\AuthService;

class AuthController extends Controller
{
    protected $registerService;

    public function __construct(AuthService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function register(RegisterRequest $request)
    {
        return $this->registerService->register(($request->validated()));
    }

    public function login(LoginRequest $request)
    {
        return $this->registerService->login($request);
    }
}
