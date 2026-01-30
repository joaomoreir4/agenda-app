<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoRegistroRequest;
use App\Http\Requests\UpdateTipoRegistroRequest;
use App\Models\TipoRegistro;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = TipoRegistro::orderBy('tipo_registro')->get();
        return view('tipos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoRegistroRequest $request)
    {
        TipoRegistro::create($request->validated());
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoRegistro $tipoRegistro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoRegistro $tipoRegistro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoRegistroRequest $request, TipoRegistro $tipoRegistro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoRegistro $tipo)
    {
        $tipo->delete();
        return back();
    }
}
