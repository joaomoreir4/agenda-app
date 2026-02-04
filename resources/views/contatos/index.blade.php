<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contatos') }}
        </h2>
    </x-slot>


    <div x-data="{ open: false, actionUrl: ''}" class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="border border-gray-300 rounded-lg">
            <div class="w-full text-center bg-teal-800 text-white font-bold p-2 rounded-t-lg">
                Lista de Contatos
            </div>

            <div class="px-5 bg-teal-700 text-white font-bold p-2 flex justify-between items-center">
                <div class="w-full max-w-sm min-w-[200px]">
                    <div class="relative">
                        <input wire:model.live.debounce.300ms='search' class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-3 pr-28 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                        placeholder="Digite o nome..."/>
                        <div class="absolute top-1 right-1 flex items-center rounded py-1.5 px-1 text-sm text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2">
                                <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                            </svg>
                        </div> 
                    </div>
                </div>

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
                    <div class=" w-full flex justify-center items-center gap-4">
                        <a href="{{ route('contatos.edit', $pessoa->id) }}" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>
                        </a>
                    </div>
                    <div class=" w-full flex justify-center items-center gap-4">
                        <button @click="open = true; actionUrl = '{{ route('contatos.destroy', $pessoa->id) }}';"
                            class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </button>
                    </div>
                </div>
                @endforeach
            </div>

            <div x-show="open" class="bg-red-800">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <div x-on:click.outside="open = false" class="bg-white px-4 py-3 text-black">
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
                                            <button @click.prevent="open = false" class="rounded-md bg-black/50 px-4 py-3 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-black/20 sm:mt-0 sm:w-auto">Cancelar</button>
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
    </div>

   
</x-app-layout>
