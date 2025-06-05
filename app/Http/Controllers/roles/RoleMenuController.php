<?php

namespace App\Http\Controllers\roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\rol\RolMenuRequest;
use App\shared\services\authorization\AuthorizationService;
use App\shared\services\roles\RoleMenuService;

// use App\shared\services\roles\RoleMenuService;

class RoleMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $roleMenuService;

    public function __construct(RoleMenuService $roleMenuService)
    {

        $this->roleMenuService = $roleMenuService;
    }

    public function index()
    {
        //
        AuthorizationService::check('roles', 'read');
        return $this->roleMenuService->list();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolMenuRequest $request)
    {
        //
        AuthorizationService::check('roles', 'create');
        return $this->roleMenuService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        AuthorizationService::check('roles', 'show');
        return  $this->roleMenuService->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RolMenuRequest $request, $id)
    {
        //
        AuthorizationService::check('roles', 'update');
        return $this->roleMenuService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        //
        AuthorizationService::check('roles', 'delete');
        return $this->roleMenuService->delete($id);
    }
}
