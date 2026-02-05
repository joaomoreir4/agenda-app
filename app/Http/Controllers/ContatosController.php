<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Registro;
use App\Models\TipoRegistro;
use App\Traits\InteractsWithBanner;
use Illuminate\Http\Request;

class ContatosController extends Controller
{
    use InteractsWithBanner;


    public function index(Request $request)
{
    $search = $request->query('search');

    $pessoas = Pessoa::query()
        ->when($search, function ($query, $search) 
        {
            return $query->where('nome', 'like', "%{$search}%");
        })
        ->orderBy('nome')
        ->paginate(10); 

    
    return view('contatos.index', compact('pessoas', 'search'));
}

   

    public function create()
    {
        $todos_tipos = TipoRegistro::orderBy('tipo_registro')->get();
        return view('contatos.create', compact('todos_tipos'));
    }



    public function store(Request $request)
    {
        $pessoa = Pessoa::create(
            [
                'nome' => $request->nome,
                'endereco' => $request->endereco,
                'data_nasc' => $request->data_nasc,
            ]
        );


        foreach ($request->contatos as $contato){
            Registro::create(
                [
                    'contato' => $contato['contato'],
                    'pessoa_id' => $pessoa->id,
                    'tipo_registro_id' => $contato['tipo_registro_id']
                ]
            );
        }
        
        return redirect(route('contatos.index'));
    }



    public function edit(string $id)
    {
        $pessoa = Pessoa::find($id);
        return view('contatos.edit', compact('pessoa'));
    }


 
    public function update(Request $request, string $id)
    {
        $pessoa = Pessoa::find($id);
        $pessoa->update([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'data_nasc' => $request->data_nasc,
            ]
        );

        $idsRestantes = collect($request->contatos)->pluck('id') ->filter()->toArray();
        $pessoa->registros()->whereNotIn('id', $idsRestantes)->delete();

        $contatos = $request->contatos;
        foreach ($contatos as $contato){
            $pessoa->registros()->updateOrCreate(
                ['id' => $contato['id'] ?? null],
                [
                    'contato' => $contato['contato'],
                    'tipo_registro_id' => $contato['tipo_registro_id']
                ]
            );
        }

        return redirect(route('contatos.index'));
    }



    public function destroy($id)
    {
        $this->banner('Usuário deletado');
        Pessoa::where('id', $id)->delete();
        return redirect()->route('contatos.index');
    }
}
