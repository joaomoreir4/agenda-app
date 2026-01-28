<el-dialog>
    <dialog id="modal-create" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
        <el-dialog-backdrop class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

        <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
        <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-slate-300 text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
            <div class="bg-slate-200 ">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 sm:mt-0 sm:ml-4 sm:text-left w-full grid grid-cols-6 items-center">
                            
                            <div class="col-span-1 mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-green-500/10 sm:mx-0 sm:size-10">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="size-6 text-green-600"> 
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" /> 
                                </svg>
                            </div>
                            <h3 id="dialog-title" class="pl-0 col-span-5 text-base font-semibold text-black">Criar contato</h3>

                            <div class="gap-4 px-6 py-3 col-span-full">
                                <label class="block mb-1 text-sm text-slate-600">
                                Nome
                                </label>
                                <input type="email" class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Digite o nome..." />
                            </div>

                            <div class="pl-6 pr-3 col-span-3">
                                <label class="block mb-1 text-sm text-slate-600">
                                Tipo de Contato
                                </label>
                                <div class="w-full max-w-xs mx-auto">
                                    <select id="selectContato" name="selectContato" class="block w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm appearance-none cursor-pointer">
                                        <option value="">Escolha...</option>
                                        <option value="telefone">Telefone</option>
                                        <option value="email">E-Mail</option>
                                        <option value="instagram">Instagram</option>
                                    </select>
                                </div> 
                            </div> 
                            <div class="pr-6 col-span-3">
                                <label class="block mb-1 text-sm text-slate-600">
                                Contato
                                </label>
                                <input type="email" class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Digite o contato..." />   
                            </div>
                        </div>
                    </div>
                </div>    
                <div class="bg-gray-700/25 mt-3 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button wire:click='' type="button" command="close" commandfor="modal-create" class="inline-flex w-full justify-center rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white hover:bg-green-400 sm:ml-3 sm:w-auto">Criar</button>
                    <button type="button" command="close" commandfor="modal-create" class="mt-3 inline-flex w-full justify-center rounded-md bg-black/50 px-3 py-2 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-black/20 sm:mt-0 sm:w-auto">Cancelar</button>
                </div>     
            </div>
        </el-dialog-panel>
    </dialog>
</el-dialog>