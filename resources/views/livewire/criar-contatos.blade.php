<div class="p-5 col-span-6 border border-gray-300 rounded-lg">
    <div class="grid grid-cols-6">
        <div class="col-span-6">
            <ul>
                @foreach ($contatos as $index => $contato)
                <li wire:key="contato{{ $index }}">
                    <input name="contatos[{{ $index }}][tipo_registro_id]" readonly value="{{ $contato['tipo_nome'] }}"></input>
                    <input name="contatos[{{ $index }}][contato]" readonly value="{{ $contato['contato'] }} "></input>
                    <button wire:click="deleteContato({{ $index }})" type="button" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">X</button>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="col-span-3">
            <label class="block mb-1 text-sm text-slate-600">
                Tipo de Contato
            </label> 
        
            <select wire:model.live='tipo_registro_id' class="block w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm appearance-none cursor-pointer">
                <option selected>-- Selecione-- </option>
                @foreach ($todos_tipos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->tipo_registro }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-span-3">
            <label class="block mb-1 text-sm text-slate-600">Contato</label>
            <input type="text" wire:model='contato' placeholder="Digite o contato..." class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" />
        </div>
          
        <div class="col-span-3">
            <button type="button" wire:click="addContato()" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Adicionar contato</button>
        </div>
    </div>       
</div>