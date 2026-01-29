<div>
    <button x-on:click="$wire.showModal = true" class="flex gap-2 bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded" type="button"> 
        <span>Novo Contato</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
        </svg>
    </button>

    <div wire:show="showModal">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div x-on:click.outside="$wire.showModal = false" class="bg-white px-4 py-3 text-black">
                        <form wire:submit="save">
                            <div class="grid grid-cols-6 gap-4">

                                <div class="col-span-6 pt-1">
                                    <h2>Criar um novo contato</h2>
                                </div>


                                <div class="col-span-6">
                                    <label class="block mb-1 text-sm text-slate-600">
                                        Nome
                                    </label>
                                    <input type="text" wire:model='nome' class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Digite o nome..." >
                                    <div>
                                        @error('nome') <span class="error">{{ $message }}</span> @enderror 
                                    </div>
                                </div>
                                
                                <div class="col-span-6">
                                    <label class="block mb-1 text-sm text-slate-600">
                                        Endereço
                                    </label>
                                    <input wire:model='endereco' id='endereco' type="text" class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Digite o endereço completo..." />   
                                </div>

                                <div class="col-span-3">
                                    <label class="block mb-1 text-sm text-slate-600">
                                        Data de nascimento
                                    </label>
                                    <input x-mask="99/99/9999" placeholder="MM/DD/YYYY" class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow">
                                </div>




                                <div class="p-5 col-span-6 border border-gray-300 rounded-lg">
                                    <div class="grid grid-cols-6">

                                        <div class="col-span-3">
                                            <label class="block mb-1 text-sm text-slate-600">
                                                Tipo de Contato
                                            </label> 
                                        
                                            <select wire:model.live="tipo" class="block w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm appearance-none cursor-pointer">
                                                <option>Selecione</option>
                                                @foreach ($todos_tipos as $tipo)
                                                    <option value="{{ $tipo->tipo_registro }}">{{ $tipo->tipo_registro }}</option>
                                                @endforeach'
                                            </select>
                                        </div>
                                        <div class="col-span-3">
                                            <label class="block mb-1 text-sm text-slate-600">Contato</label>
                                            <input type="text" wire:model.live="contato" placeholder="Digite o contato..." class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" />
                                        </div>
                                        
                                        
                                        <div class="col-span-3">
                                            <button wire:click="addContato()" type="button" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Adicionar contato</button>
                                        </div>

                                        <div class="col-span-6">
                                            <ul>
                                                @foreach ($contatos as $index => $contato)
                                                <li wire:key="contato{{ $index }}">
                                                    <span>{{ $contato['tipo'] }} {{ $contato['contato'] }} </span>
                                                    <button wire:click="deleteContato({{ $index }})" type="button" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">R</button>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        
                                    </div>       
                                </div>




                                <div class="col-span-6 flex justify-between">
                                    <button x-on:click="$wire.showModal = false" type="button" class="rounded-md bg-black/50 px-4 py-3 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-black/20 sm:mt-0 sm:w-auto">Cancelar</button>
                                    <button type="submit" class="rounded-md bg-green-500 px-4 py-3 text-sm font-semibold text-white hover:bg-green-400 sm:ml-3 sm:w-auto">Criar</button>
                                </div> 

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


