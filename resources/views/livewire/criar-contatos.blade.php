<div class="p-5 col-span-6 border border-gray-300 rounded-lg">
    <div class="grid grid-cols-12 gap-5 m-3">
        <div class="col-span-12">
            <ul>
                @foreach ($contatos as $index => $contato)
                <li wire:key="contato{{ $index }}" class="grid grid-cols-12 gap-5 m-1">
                    <input class="col-span-5 w-full border border-slate-200 rounded-md focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" name="contatos[{{ $index }}][tipo_registro]" readonly value="{{ $contato['tipo_registro'] }}"></input>
                    <input class="col-span-5 w-full border border-slate-200 rounded-md focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" name="contatos[{{ $index }}][contato]" readonly value="{{ $contato['contato'] }} "></input>
                    <input type="hidden" name="contatos[{{ $index }}][tipo_registro_id]" readonly value="{{ $contato['tipo_registro_id'] }}"></input>
                    <button wire:click="deleteContato({{ $index }})" type="button" class="col-span-1 w-full bg-red-500 hover:bg-red-400 text-white font-bold py-1 border-b-4 border-red-700 hover:border-red-500 rounded">X</button>
                </li>
                @endforeach
            </ul>
            
            <div class="text-xs text-red-500">
                @error('contatos') {{ $message }} @enderror
            </div>
        </div>
        
        <div class="col-span-12 grid grid-cols-12 gap-5 m-1 items-end"> 
            <div class="col-span-4">
                <label class="mb-1 text-sm text-slate-600">
                    Tipo de Contato
                </label> 
                <select wire:model.live='tipo_registro_id' class="block w-full px-3 py-2 text-gray-700 bg-white border {{ $errors->has('tipo_registro_id') ? 'border-red-500 focus:border-red-500' : 'border-slate-200 focus:border-slate-400 hover:border-slate-300' }} rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm appearance-none cursor-pointer">
                    <option value="" disabled selected>-- Selecione-- </option>
                    @foreach ($todos_tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->tipo_registro }}</option>
                    @endforeach
                </select>
                <div class="h-5 text-xs text-red-500">
                    @error('tipo_registro_id') {{ $message }} @enderror
                </div>
            </div>

            <div class="col-span-5">
                <label class="mb-1 text-sm text-slate-600">Contato</label>
                <input type="text" wire:model='contato' placeholder="Digite o contato..." class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none {{ $errors->has('contato') ? 'border-red-500 focus:border-red-500' : 'border-slate-200 focus:border-slate-400 hover:border-slate-300' }} shadow-sm focus:shadow" />
                    
                <div class="h-5 text-xs text-red-500">
                    @error('contato') {{ $message }} @enderror
                </div>
            </div>
            
            <div class="col-span-3">
                <button type="button" wire:click="addContato()" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-1 px-3 border-b-4 border-blue-700 hover:border-blue-500 rounded">Adicionar contato +</button>
                <div class="h-5"></div>
            </div>
        </div>
    </div>       
</div>