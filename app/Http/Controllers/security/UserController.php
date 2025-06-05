<?php

namespace App\Http\Controllers\security;

use App\Http\Controllers\Controller;
use App\Http\Requests\security\UserRequest;
use App\Http\Requests\security\UserUpdateRequest;
use App\shared\services\authorization\AuthorizationService;
use App\shared\services\security\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        AuthorizationService::check('usuarios', 'read');

        return $this->userService->list();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //
        $permiso = AuthorizationService::check('usuarios', 'create');

        return $this->userService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        AuthorizationService::check('usuarios', 'read');

        return $this->userService->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, $id)
    {
        //
        AuthorizationService::check('usuarios', 'update');

        return $this->userService->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        AuthorizationService::check('usuarios', 'delete');

        return $this->userService->delete($id);
    }
}
