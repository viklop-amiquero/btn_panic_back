<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegistroRequest;
use App\shared\services\auth\AuthService;

class AuthController extends Controller
{
    //
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegistroRequest $request)
    {
        return $this->authService->store($request->validated());
    }

    public function login(LoginRequest $request)
    {
        return $this->authService->login($request->validated());
    }

    public function logout(Request $request)
    {
        return $this->authService->logout($request->user());
    }
}
