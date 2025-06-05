<?php

namespace App\Http\Controllers\business;

use App\Http\Controllers\Controller;
use App\Http\Requests\business\CategoriaRequest;
use App\Models\business\Categoria;
use App\shared\services\authorization\AuthorizationService;
use App\shared\services\business\CategoriaService;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function index()
    {
        AuthorizationService::check('categoria', 'read');
        return $this->categoriaService->list();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        //
        AuthorizationService::check('categoria', 'create');
        return $this->categoriaService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, $id)
    {
        //
        AuthorizationService::check('categoria', 'update');
        return $this->categoriaService->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        AuthorizationService::check('categoria', 'delete');
        return $this->categoriaService->delete($id);
    }
}
