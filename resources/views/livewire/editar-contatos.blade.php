<div>
    <button x-on:click="$wire.showModal = true" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>
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
                                    <input type="text" wire:model='nome' id="nome" class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Digite o nome..." />
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

                                <div class="col-span-3">
                                    <label class="block mb-1 text-sm text-slate-600">
                                        Tipo de Contato
                                    </label>
                                    <div class="w-full max-w-xs mx-auto">
                                        <select wire:model='tipo_contato' id="tipo-contato" class="block w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm appearance-none cursor-pointer">
                                            <option>Selecione</option>
                                            @foreach ($tipos as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->tipo_registro }}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                </div>  

                                <div class="col-span-6">
                                    <label class="block mb-1 text-sm text-slate-600">
                                        Contato
                                    </label>
                                    <input wire:model='contato' id='contato' type="text" class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Digite o contato..." />   
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


