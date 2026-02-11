<?php

namespace App\Http\Controllers;

use App\Events\PessoaCadastrada;
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
        $rules = [
            'nome' => 'required|max:45',
            'contatos' => 'required|array|min:1',
        ];

        $messages = [
            'nome.required' => 'O campo nome é obrigatório',
            'contatos.required' => 'Você precisa adicionar pelo menos um contato.'
        ];

        $validated = $request->validate($rules, $messages);

        $pessoa = Pessoa::create(
            [
                'nome' => $validated['nome'],
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

        PessoaCadastrada::dispatch($pessoa, $request->contatos);
        $this->banner('Contato criado!');
        return redirect(route('contatos.index'));
    }



    public function edit(string $id)
    {
        $pessoa = Pessoa::find($id);
        return view('contatos.edit', compact('pessoa'));
    }


 
    public function update(Request $request, string $id)
    {
         $rules = [
            'nome' => 'required|max:45',
            'contatos' => 'required|array|min:1',
        ];

        $messages = [
            'nome.required' => 'O campo nome é obrigatório',
            'contatos.required' => 'Você precisa adicionar pelo menos um contato.'
        ];

        $validated = $request->validate($rules, $messages);

        $pessoa = Pessoa::find($id);
        $pessoa->update([
            'nome' => $validated['nome'],
            'endereco' => $request->endereco,
            'data_nasc' => $request->data_nasc,
            ]
        );

        $idsRestantes = collect($validated['contatos'])->pluck('id') ->filter()->toArray();
        $pessoa->registros()->whereNotIn('id', $idsRestantes)->delete();

        foreach ($validated['contatos'] as $contato){
            $pessoa->registros()->updateOrCreate(
                ['id' => $contato['id'] ?? null],
                [
                    'contato' => $contato['contato'],
                    'tipo_registro_id' => $contato['tipo_registro_id']
                ]
            );
        }
        
        $this->banner('Contato editado com sucesso!');
        return redirect()->route('contatos.index');
    }



    public function show($id)
    {
        $pessoa = Pessoa::find($id);
        return view('contatos.show', compact('pessoa'));
    }



    public function destroy($id)
    {
        Pessoa::where('id', $id)->delete();
        $this->banner('Contato deletado!');
        return redirect()->route('contatos.index');
    }
}
