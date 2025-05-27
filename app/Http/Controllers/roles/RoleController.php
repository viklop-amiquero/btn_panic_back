<?php

namespace App\Http\Controllers\roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\rol\RolRequest;
use App\Models\roles\Role;
use App\shared\services\roles\RoleService;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        return $this->roleService->list();
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RolRequest $request,  $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
