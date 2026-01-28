<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="border border-gray-300 rounded-lg">
        <div class="w-full text-center bg-teal-800 text-white font-bold p-2 rounded-t-lg">
            Listar Contatos
        </div>

        <div class="px-5 bg-teal-700 text-white font-bold p-2 flex justify-between items-center">
            <div class="w-full max-w-sm min-w-[200px]">
                <div class="relative">
                    <input class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-3 pr-28 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                    placeholder="Digite o nome..."/>
                    <button class="absolute top-1 right-1 flex items-center rounded bg-slate-800 py-1 px-2.5 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                        </svg>
                        Buscar
                    </button> 
                </div>
            </div>

            <div>
                <button command="show-modal" commandfor="modal-create" class="flex gap-2 bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded" type="button"> 
                    <span>Novo Contato</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                    </svg>
                </button>
                <x-modals.criar-contato />
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
                        <h3>{{ $pessoa->nome }}</h3>
                    </div>
            </div>
            <div class="col-span-3 flex border border-b-gray-400">
                <ul class="ml-5">
                    @foreach ($pessoa->registros as $registro)
                        <li class="m-1">
                            <strong> {{ $registro->tipoRegistro->tipo_registro }}:</strong>
                            {{ $registro->contato }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex">
                <div class="border border-b-gray-400 w-full flex justify-center items-center gap-4">
                    <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>
                    </button>

                    <button command="show-modal" commandfor="modal-delete-{{ $pessoa->id }}" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </button>

                    <x-modals.deletar-contato :pessoa="$pessoa"/>

                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
