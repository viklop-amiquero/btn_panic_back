<?php

namespace App\Http\Controllers\roles;

use App\Http\Controllers\Controller;
use App\Http\Resources\roles\MenuCollection;
use App\Models\roles\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        if ($user->isUser()) {

            return new MenuCollection(Menu::where('estado', '1')->get());
        }
        return response()->json([
            'message' => 'Usuario no permitida.'
        ], 403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
