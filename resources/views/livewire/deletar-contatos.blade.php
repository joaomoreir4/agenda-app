<div>
    <button x-on:click="$wire.showModal = true" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
    </button>

    <div wire:show="showModal">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div x-on:click.outside="$wire.showModal = false" class="bg-white px-4 py-3 text-black">
                        <form wire:submit="delete({{ $pessoa->id }})">
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
                                    <button x-on:click="$wire.showModal = false" type="button" class="rounded-md bg-black/50 px-4 py-3 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-black/20 sm:mt-0 sm:w-auto">Cancelar</button>
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