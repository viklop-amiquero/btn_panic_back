<?php

namespace App\Http\Controllers\business;

use Illuminate\Http\Request;
use App\Models\business\Reporte;
use App\Http\Controllers\Controller;
use App\Http\Requests\business\ReporteRequest;
use App\shared\services\business\ReporteService;
use App\shared\services\authorization\AuthorizationService;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $reporteService;

    public function __construct(ReporteService $reporteService)
    {
        $this->reporteService = $reporteService;
    }


    public function index()
    {
        //
        AuthorizationService::check('reportes', 'read');
        return $this->reporteService->list();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ReporteRequest $request)
    {
        //
        AuthorizationService::check('reportes', 'create');
        return $this->reporteService->create($request->validated(), $request->file('imagen'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $reporte)
    {
        //
        AuthorizationService::check('reportes', 'read');

        return $this->reporteService->show($reporte);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        AuthorizationService::check('reportes', 'update');

        return $this->reporteService->update($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        AuthorizationService::check('reportes', 'delete');
        return $this->reporteService->delete($id);
    }
}
