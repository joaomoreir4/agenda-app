<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="border border-gray-300 rounded-lg">
        <div class="w-full text-center bg-teal-800 text-white font-bold p-2 rounded-t-lg">
            Listar Contatos
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
                <livewire:criar-contatos />
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
                    <livewire:editar-contatos :pessoa="$pessoa"/>
                </div>
                <div class="border border-b-gray-400 w-full flex justify-center items-center gap-4">
                    <livewire:deletar-contatos :pessoa="$pessoa"/>
                </div>
                
            </div>
            @endforeach
        </div>
    </div>

</div>
