<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\RegistroRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function register(RegistroRequest $request)
    {
        return $request;
    }
}
