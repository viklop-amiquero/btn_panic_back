<?php

namespace App\Policies\security;

use App\Models\security\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */

    protected string $menuKey = 'usuarios';

    public function __construct()
    {
        //

    }
}
