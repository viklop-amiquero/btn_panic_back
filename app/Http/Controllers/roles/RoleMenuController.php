<?php

namespace App\Http\Controllers\roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\rol\RolMenuRequest;
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
        return $this->roleMenuService->list();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolMenuRequest $request)
    {
        //
        return $this->roleMenuService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        return  $this->roleMenuService->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RolMenuRequest $request, $id)
    {
        //
        return $this->roleMenuService->update($id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        //
        return $this->roleMenuService->delete($id);
    }
}
