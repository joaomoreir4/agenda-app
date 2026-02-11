<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contatos') }}
        </h2>
    </x-slot>


    <div x-data="{ modalDelete: false, actionUrl: ''}" class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="border border-gray-300 rounded-lg">
            <div class="w-full text-center bg-teal-800 text-white font-bold p-2 rounded-t-lg">
                Lista de Contatos
            </div>

            <div class="px-5 bg-teal-700 text-white font-bold p-2 flex justify-between items-center">
                 <div class="w-full max-w-sm min-w-[200px]">
                    <div class="relative">
                        <form action="{{ route('contatos.index') }}" method="GET">
                            <input type="text" name="search" value="{{ $search }}" class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-3 pr-28 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                            placeholder="Digite o nome..."/>
                            <button class="absolute top-1 right-1 flex items-center rounded bg-slate-800 py-1 px-2.5 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2">
                                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                                </svg>
                                Buscar
                            </button>
                        </form>
                    </div>
                </div>
                <a href="{{ route('contatos.index') }}" class="mr-auto ml-2 text-xs underline">
                    Limpar busca
                </a>

                <div>
                    <a href="{{ route('contatos.create') }}" class="flex gap-2 bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded" type="button"> 
                        <span>Novo Contato</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                    </a>
                </div>
            </div>
        
            <div class="bg-teal-600 text-white font-bold grid grid-cols-6">
                <div class="col-span-2 pl-1 text-center pt-2">Nome</div>
                <div class="col-span-3 pl-1 text-center pt-2">Contatos</div>
                <div class="pl-1 text-center pt-2">Ações</div>      
            </div>

            <div class="grid grid-cols-6">
                @foreach ($pessoas as $pessoa)
                <div class="col-span-2 flex border border-b-gray-400">
                        <div class="flex justify-center items-center ml-5"> 
                            <a href="{{ route('contatos.edit', $pessoa->id) }}" class="font-bold cursor-pointer hover:text-blue-600">
                                {{ $pessoa->nome }}
                            </a>
                        </div>
                </div>
                <div class="col-span-3 items-center flex border border-b-gray-400">
                    <ul class="ml-5">
                        @foreach ($pessoa->registros as $registro)
                            <li class="m-1">
                                <strong> {{ $registro->tipoRegistro->tipo_registro }}:</strong>
                                {{ $registro->contato }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex border border-b-gray-400 p-4">
                    <div
                        class="w-full lg:w-auto p-3 border border-b md:border-none lg:table-cell relative lg:static flex justify-between border-gray-300/50" x-data="{ open: false }">
                        <div class="flex flex-row justify-center">
                            <button x-on:click="open = !open" aria-label="Mais Ações">
                                <svg class="h-6 w-6" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.33317 4.66683C8.33317 4.85092 8.18393 5.00016 7.99984 5.00016C7.81574 5.00016 7.6665 4.85092 7.6665 4.66683C7.6665 4.48273 7.81574 4.3335 7.99984 4.3335C8.18393 4.3335 8.33317 4.48273 8.33317 4.66683Z" stroke="#334155" />
                                    <path d="M8.33317 7.99984C8.33317 8.18393 8.18393 8.33317 7.99984 8.33317C7.81574 8.33317 7.6665 8.18393 7.6665 7.99984C7.6665 7.81574 7.81574 7.6665 7.99984 7.6665C8.18393 7.6665 8.33317 7.81574 8.33317 7.99984Z" stroke="#334155" />
                                    <path d="M8.33317 11.3333C8.33317 11.5174 8.18393 11.6667 7.99984 11.6667C7.81574 11.6667 7.6665 11.5174 7.6665 11.3333C7.6665 11.1492 7.81574 11 7.99984 11C8.18393 11 8.33317 11.1492 8.33317 11.3333Z" stroke="#334155" />
                                </svg>
                            </button>

                            <div x-cloak class="grid grid-flow-row rounded-xl shadow-lg bg-white absolute py-2 mt-12 z-40" x-show="open" @click.outside="open = false">
                                <div class="grid grid-flow-row text-left text-cinza2 pl-2 pr-2">
                                    <p class="font-bold">Ações:</p>
                                    <a class="flex gap-2" href="{{ route('contatos.show', $pessoa->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cinza2" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                        </svg>
                                        Visualizar contato
                                    </a>
                                    <a class="flex gap-2" href="{{ route('contatos.edit', $pessoa->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cinza2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                                            <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                                        </svg>
                                        Editar contato
                                    </a>
                                    <a class="flex gap-2 hover:cursor-pointer" @click="modalDelete = true; open = !open; actionUrl = '{{ route('contatos.destroy', $pessoa->id) }}';">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                        Excluir contato
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                @endforeach
            </div>

            <div x-cloak x-show="modalDelete">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <div x-on:click.outside="modalDelete = false" class="bg-white px-4 py-3 text-black">
                                <form :action="actionUrl" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="grid grid-cols-6">

                                        <div class="col-span-6 flex items-center gap-3 pt-3">
                                            <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-500/10 sm:mx-0 sm:size-10">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 text-red-400">
                                                    <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>

                                            <div class="justify-start items-center">
                                                <h2 id="dialog-title" class="font-semibold text-black">Deletar contato</h2>
                                            </div>
                                        </div>

                                        <div class="col-span-6 p-3">
                                            <div class="mt-2">
                                                <p class="text-gray-800">Você tem certeza que deseja deletar esse contato? Todos os dados serão removidos permanentemente.</p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-span-6 flex justify-end p-3">
                                            <button @click.prevent="modalDelete = false" class="rounded-md bg-black/50 px-4 py-3 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-black/20 sm:mt-0 sm:w-auto">Cancelar</button>
                                            <button type="submit" class="rounded-md bg-red-500 px-4 py-3 text-sm font-semibold text-white hover:bg-red-400 sm:ml-3 sm:w-auto">Deletar</button>
                                        </div> 

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-cloak x-show="modalShow" class="p-5 col-span-6 border border-gray-300 rounded-lg">
            <div class="grid grid-cols-12 gap-5 m-3">
                <div class="col-span-12">
                    {{-- <ul>
                        @foreach ($contatos as $index => $contato)
                        <li wire:key="contato{{ $index }}" class="grid grid-cols-12 gap-5 m-1">
                            <input class="col-span-5 w-full border border-slate-200 rounded-md focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" name="contatos[{{ $index }}][tipo_registro]" readonly value="{{ $contato['tipo_nome'] }}"></input>
                            <input class="col-span-6 w-full border border-slate-200 rounded-md focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" name="contatos[{{ $index }}][contato]" type="text" value="{{ $contato['contato'] }} "></input>
                            <input type="hidden" name="contatos[{{ $index }}][tipo_registro_id]" readonly value="{{ $contato['tipo_registro_id'] }}"></input>
                            <input type="hidden" name="contatos[{{ $index }}][id]" readonly value="{{ $contato['id'] ?? '' }}"></input>
                            <button wire:click="deleteContato({{ $index }})" type="button" class="col-span-1 w-full bg-red-500 hover:bg-red-400 text-white font-bold py-1 border-b-4 border-red-700 hover:border-red-500 rounded">X</button>
                        </li>
                        @endforeach
                    </ul> --}}

                    <div class="text-xs text-red-500 m-1">
                        {{-- @error('contatos') {{ $message }} @enderror --}}
                    </div>
                </div>

                <div class="col-span-12 grid grid-cols-12 gap-5 m-1 items-end"> 
                    <div class="col-span-4">
                        <label class="mb-1 text-sm text-slate-600">
                            Tipo de Contato
                        </label> 
                    
                        <select wire:model.live='tipo_registro_id' class="block w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm appearance-none cursor-pointer">
                            <option selected>-- Selecione-- </option>
                            {{-- @foreach ($todos_tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->tipo_registro }}</option>
                            @endforeach --}}
                        </select>
                    </div> 

                    <div class="col-span-5">
                        <label class="mb-1 text-sm text-slate-600">Contato</label>
                        <input type="text" wire:model='contato' placeholder="Digite o contato..." class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" />
                    </div>
                    
                    <div class="col-span-3">
                        <button type="button" wire:click="addContato()" class="w-full bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Adicionar contato</button>
                    </div>
                </div>
            </div>       
        </div>
        
            <div class="mt-4">
                {{ $pessoas->appends(['search' => $search])->links() }}
            </div>
    </div>

   
</x-app-layout>
