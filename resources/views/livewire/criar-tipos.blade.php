
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="border border-gray-300 rounded-lg">
        <div class="w-full text-center bg-teal-800 text-white font-bold p-2 rounded-t-lg">
            Gerenciar Tipos
        </div>
                <div class="bg-white">
                    <form wire:submit="save" class="px-5">
                        <div class="grid grid-cols-6 gap-4 p-5">
                            <div class="col-span-6 pt-1 justify-center">
                                <h1 class="text-lg">Criar um novo tipo de contato</h1>
                            </div>

                            <div class="col-span-6">
                                <label class="block mb-1 text-sm text-slate-600">
                                    Tipo
                                </label>
                                <input type="text" wire:model.live='tipo_registro' class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Digite o nome do tipo..." >
                                <div>
                                    @error('nome') <span class="error">{{ $message }}</span> @enderror 
                                </div>
                            </div>

                            <div class="col-span-6 flex justify-end">
                                <button type="submit" class="rounded-md bg-blue-500 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-400 sm:ml-3 sm:w-auto">Criar</button>
                            </div> 
                        </div>
                    </form>
                </div>

    </div>
</div>




