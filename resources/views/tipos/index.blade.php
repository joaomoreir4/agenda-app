<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tipos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border border-gray-300 rounded-lg bg-white">
                <div class="w-full text-center bg-teal-800 text-white font-bold p-2 rounded-t-lg">
                    Gerenciar Tipos
                </div>
                    <div class="">
                        <form action="{{ route('tipos.store') }}" method="POST" class="px-5">
                            @csrf
                            <div class="grid grid-cols-6 gap-4 p-5">
                                <div class="col-span-6 pt-1 justify-center">
                                    <h1 class="text-lg">Criar um novo tipo de contato</h1>
                                </div>

                                {{-- <div class="col-span-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                    <span class="block sm:inline">Novo tipo de contato criado com sucesso!</span>
                                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                    </span>
                                </div> --}}

                                <div class="col-span-6">
                                    <label class="block mb-1 text-sm text-slate-600">
                                        Tipo
                                    </label>
                                    <input type="text" name="tipo_registro" class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Digite o nome do tipo..." >
                                    <div>
                                        {{-- @error('nome') <span class="error">{{ $message }}</span> @enderror  --}}
                                    </div>
                                </div>

                                <div class="col-span-6 flex justify-end">
                                    <button type="submit" class="rounded-md bg-blue-500 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-400 sm:ml-3 sm:w-auto">Criar</button>
                                </div> 
                            </div>
                        </form>
                    </div>

                    <div class="w-full text-center bg-teal-700 text-white font-bold p-2">
                        Lista de Tipos
                    </div>

                    <div class="px-5 bg-teal-600 text-white font-bold p-2 flex justify-between items-center">
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
                    </div>
                        
                    <div class="grid grid-cols-6">
                        
                
                        
                        @foreach ($tipos as $tipo)
                            <div class="col-span-5 flex border border-b-gray-400">
                                    <div class="flex justify-center items-center ml-5"> 
                                        <h3>{{ $tipo->tipo_registro }}</h3>
                                    </div>
                            </div>
                            <div class="flex">
                                <div class="border border-b-gray-400 w-full flex justify-center items-center gap-4">
                                    <button command="show-modal" commandfor="dialog-{{ $tipo->id }}" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </button>

                                    <el-dialog>
                                        <dialog id="dialog-{{ $tipo->id }}" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                                            
                                            

                                            <el-dialog-backdrop class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

                                            <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                                                
                                            <el-dialog-panel class="p-4 relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                            
                                                <form id="form-delete-{{ $tipo->id }}" action="{{ route('tipos.destroy', $tipo->id) }}" method="POST">
                                                    
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
                                                                <h2 id="dialog-title" class="font-semibold text-black">Deletar tipo</h2>
                                                            </div>
                                                        </div>

                                                        <div class="col-span-6 p-3">
                                                            <div class="mt-2">
                                                                <p class="text-gray-800">Você tem certeza que deseja deletar esse tipo? Todos os dados serão removidos permanentemente.</p>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-span-6 flex justify-end p-3">
                                                            <button command="close" commandfor="dialog-{{ $tipo->id }}" type="button" class="rounded-md bg-black/50 px-4 py-3 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-black/20 sm:mt-0 sm:w-auto">Cancelar</button>
                                                            <button form="form-delete-{{ $tipo->id }}" type="submit" class="rounded-md bg-red-500 px-4 py-3 text-sm font-semibold text-white hover:bg-red-400 sm:ml-3 sm:w-auto">Deletar</button>
                                                        </div> 
                                                    </div>
                                                </form>
                                            </el-dialog-panel>
                                            </div>
                                        </dialog>
                                        </el-dialog>
                                </div>
                            </div>
                        @endforeach
                    </div>

            </div>
        </div>





    </div>
</x-app-layout>
