<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\shared\services\auth\RoleMenuAuthService;

class RoleMenuAuthController extends Controller
{
    //
    protected $roleMenuAuthService;

    public function __construct(RoleMenuAuthService $roleMenuAuthService)
    {
        $this->roleMenuAuthService = $roleMenuAuthService;
    }

    public function show()
    {
        return $this->roleMenuAuthService->getRoleMenuAuth();
    }
}
