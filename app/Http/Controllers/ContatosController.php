<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\TipoRegistro;
use Illuminate\Http\Request;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pessoas = Pessoa::orderBy('nome')->get();
        return view('contatos.index', compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $todos_tipos = TipoRegistro::orderBy('tipo_registro')->get();
        return view('contatos.create', compact('todos_tipos'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
