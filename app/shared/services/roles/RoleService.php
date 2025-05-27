<?php

namespace App\shared\services\roles;

use App\Http\Resources\roles\RoleCollection;
use App\Models\roles\Role;
use App\shared\Traits\AuthorizesUser;

class RoleService
{
    use AuthorizesUser;

    public function list()
    {
        $this->authorizeUser();

        return new RoleCollection(Role::where('estado', '1')->get());
    }
}
