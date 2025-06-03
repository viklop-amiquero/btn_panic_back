<?php

namespace App\Http\Controllers\password;

use Illuminate\Http\Request;
use App\Models\security\User;
use App\Models\security\Clave;
use App\Models\security\Cliente;
use App\Models\security\Persona;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\shared\services\security\PasswordService;
use App\Http\Requests\password\PasswordRecoverRequest;

class PasswordController extends Controller
{
    //
    protected $passwordService;

    public function __construct(PasswordService $passwordService)
    {
        $this->passwordService = $passwordService;
    }

    public function recoverPassword(PasswordRecoverRequest $request)
    {
        $data = $request->validated();
        return $this->passwordService->recover($data);
    }

    public function resetPassword(User $user)
    {
        return $this->passwordService->reset($user);
    }
}
