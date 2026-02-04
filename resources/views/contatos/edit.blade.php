<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contatos > Editar Contato') }}
        </h2>
    </x-slot>

    <div>
        <div>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="border border-gray-300 rounded-lg bg-white">
                        <div class="w-full text-center bg-cyan-800 text-white font-bold p-2 rounded-t-lg">
                            Editar Contato
                        </div>

                        <div>

                            <form action="{{ route('contatos.update', $pessoa) }}" method="POST" class="px-5">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-6 gap-4 p-5">

                                    <div class="col-span-6 pt-1">
                                        <h2>Editando contato: {{ $pessoa->nome }}</h2> 
                                    </div>


                                    <div class="col-span-6">
                                        <label class="block mb-1 text-sm text-slate-600">
                                            Nome
                                        </label>
                                        <input type="text" value="{{ $pessoa->nome }}" name='nome' class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Digite o nome..." >
                                        <div>
                                            @error('nome') <span class="error">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>
                                    
                                    <div class="col-span-6">
                                        <label class="block mb-1 text-sm text-slate-600">
                                            Endereço
                                        </label>
                                        <input type="text" value={{ $pessoa->endereco }} name='endereco' id='endereco' class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Digite o endereço completo..." />   
                                    </div>

                                    <div class="col-span-3">
                                        <label class="block mb-1 text-sm text-slate-600">
                                            Data de nascimento
                                        </label>
                                        <input type="date" value={{ $pessoa->data_nasc }} name='data_nasc' class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow">
                                    </div>
                                    
                                    <livewire:editar-contatos :wire:key="$pessoa->nome" :pessoa="$pessoa"/>

                                    <div class="col-span-6 flex justify-between">
                                        <a href="{{ route('contatos.index') }}" class="rounded-md bg-black/50 px-4 py-3 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-black/20 sm:mt-0 sm:w-auto">Cancelar</a>
                                        <button type="submit" class="rounded-md bg-green-500 px-4 py-3 text-sm font-semibold text-white hover:bg-green-400 sm:ml-3 sm:w-auto">Salvar</button>
                                    </div> 

                                </div>
                            </form>

                    </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>





</x-app-layout>
