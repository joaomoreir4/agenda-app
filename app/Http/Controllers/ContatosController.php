<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Registro;
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
        dd($request);
        $pessoa = Pessoa::create(
            [
                'nome' => $request->nome,
                'endereco' => $request->endereco,
                'data_nasc' => $request->data_nasc,
            ]
        );

        // $registro = Registro::create(
        //     [
        //         'tipo_registro_id'
        //     ]
        // )


        dd($pessoa);
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
    public function destroy($id)
    {
        Registro::where('pessoa_id', $id)->delete();
        Pessoa::where('id', $id)->delete();
        return back();
    }
}
