<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('contatos.index') }}" class="hover:text-teal-800 hover:underline">Contatos</a> > Visualizar Contato
        </div>
    </x-slot>

    <div>
        <div>

            <div class="py-12" x-data="{ open: false, actionUrl: ''}">
                <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                    <div class="border border-gray-300 rounded-lg bg-white">
                        <div class="w-full text-center bg-teal-800 text-white font-bold p-2 rounded-t-lg">
                            Visualizar Contato
                        </div>

                        <div>
                            <div class="grid grid-cols-6 gap-4 p-5">
                                <div class="col-span-6 pt-1">
                                    <h2>Visualizando contato: {{ $pessoa->nome }}</h2> 
                                </div>

                                <div class="col-span-4">
                                    <label class="block mb-1 text-sm text-black">
                                        Nome
                                    </label>
                                    <input disabled value="{{ $pessoa->nome }}" name='nome' class="w-full bg-white text-slate-800 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease shadow-sm">
                                </div>

                                <div class="col-span-2">
                                    <label class="block mb-1 text-sm text-black">
                                        Data de nascimento
                                    </label>
                                    <input disabled type="date" value="{{ $pessoa->data_nasc }}" name='data_nasc' class="w-full bg-white text-slate-800 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease shadow-sm">
                                </div>
                                
                                <div class="col-span-6">
                                    <label class="block mb-1 text-sm text-black">
                                        Endereço
                                    </label>
                                    <input disabled value="{{ $pessoa->endereco }}" name='endereco' id='endereco' class="w-full bg-white text-slate-800 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease shadow-sm">
                                </div>
                                
                                <livewire:exibir-contatos :wire:key="$pessoa->nome" :pessoa="$pessoa"/>
                                
                                <div class="col-span-6 flex justify-between">
                                    <a href="{{ route('contatos.index') }}" class="rounded-md bg-black/50 px-4 py-3 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-black/20 sm:mt-0 sm:w-auto">Voltar</a>
                                    <button type="button" @click="open = true; actionUrl = '{{ route('contatos.destroy', $pessoa->id) }}';" class="ml-auto rounded-md bg-red-500 px-4 py-3 text-sm font-semibold text-white hover:bg-red-400 sm:w-auto"> Deletar contato
                                    </button>
                                    <a href="{{ route('contatos.edit', $pessoa->id) }}" class="rounded-md bg-blue-500 px-4 py-3 text-sm font-semibold text-white hover:bg-blue-400 sm:ml-3 sm:w-auto">Editar contato</a>
                                </div> 
                            </div>
                            
                            <div x-cloak x-show="open">
                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                                <div class="fixed inset-0 z-10 overflow-y-auto">
                                    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                                        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                            <div x-on:click.outside="open = false" class="bg-white px-4 py-3 text-black">
                                                <form id="delete-form" :action="actionUrl" method="POST">
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
                                                            <button @click.prevent="open = false" class="rounded-md bg-black/50 px-4 py-3 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-black/20 sm:mt-0 sm:w-auto">Cancelar</button>
                                                            <button form="delete-form" type="submit" class="rounded-md bg-red-500 px-4 py-3 text-sm font-semibold text-white hover:bg-red-400 sm:ml-3 sm:w-auto">Deletar</button>
                                                        </div> 

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
