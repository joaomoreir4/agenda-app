<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contatos') }}
        </h2>
    </x-slot>

    <div>
        <div>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="border border-gray-300 rounded-lg bg-white">
                        <div class="w-full text-center bg-teal-800 text-white font-bold p-2 rounded-t-lg">
                            Criar Contato
                        </div>

                        <div x-data="gerenciaContatos()">

                            <form action="{{ route('contatos.store') }}" method="POST" class="px-5">
                                <div class="grid grid-cols-6 gap-4 p-5">

                                    <div class="col-span-6 pt-1">
                                        <h2>Criar um novo contato</h2>
                                    </div>


                                    <div class="col-span-6">
                                        <label class="block mb-1 text-sm text-slate-600">
                                            Nome
                                        </label>
                                        <input type="text" name='nome' class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Digite o nome..." >
                                        <div>
                                            @error('nome') <span class="error">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>
                                    
                                    <div class="col-span-6">
                                        <label class="block mb-1 text-sm text-slate-600">
                                            Endereço
                                        </label>
                                        <input name='endereco' id='endereco' type="text" class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Digite o endereço completo..." />   
                                    </div>

                                    <div class="col-span-3">
                                        <label class="block mb-1 text-sm text-slate-600">
                                            Data de nascimento
                                        </label>
                                        <input x-mask="99/99/9999" name='data_nasc' placeholder="MM/DD/YYYY" class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow">
                                    </div>




                                    <div class="p-5 col-span-6 border border-gray-300 rounded-lg">
                                        <div class="grid grid-cols-6">
                                            <div class="col-span-6">
                                                <ul>
                                                    {{-- @foreach ($contatos as $index => $contato)
                                                    <li wire:key="contato{{ $index }}">
                                                        <span>{{ $contato['tipo_nome'] }} {{ $contato['contato'] }} </span>
                                                        <button wire:click="deleteContato({{ $index }})" type="button" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">R</button>
                                                    </li>
                                                    @endforeach --}}
                                                </ul>
                                            </div>

                                            <div class="col-span-3">
                                                <label class="block mb-1 text-sm text-slate-600">
                                                    Tipo de Contato
                                                </label> 
                                            
                                                <select x-model='novoTipoId' x-ref='selectTipo' class="block w-full px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm appearance-none cursor-pointer">
                                                    <option>Selecione</option>
                                                    @foreach ($todos_tipos as $tipo)
                                                        <option value="{{ $tipo->id }}">{{ $tipo->tipo_registro }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-3">
                                                <label class="block mb-1 text-sm text-slate-600">Contato</label>
                                                <input type="text" x-model='novoContatoValor' name="contato" placeholder="Digite o contato..." class="w-full bg-white placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" />
                                            </div>
                                            
                                            
                                            <div class="col-span-3">
                                                <button type="button" @click="adicionar" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Adicionar contato</button>
                                            </div>
                                        </div>       
                                    </div>

                                    <div class="col-span-6 flex justify-between">
                                        <button type="button" class="rounded-md bg-black/50 px-4 py-3 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-black/20 sm:mt-0 sm:w-auto">Cancelar</button>
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

    <script>
        function gerenciaContatos() {
            return {
                lista: [],
                novoTipoId: '',
                novoContatoValor: '',
                erro: '',

                adicionar() {
                    if (!this.novoTipoId || !this.novoContatoValor) {
                        this.erro = 'Preencha o tipo e o contato.';
                        return;
                    }
                    
                    // Pega o texto do select para mostrar bonitinho na lista
                    let select = this.$refs.selectTipo;
                    let textoTipo = select.options[select.selectedIndex].text;

                    this.lista.push({
                        tipo_id: this.novoTipoId,
                        tipo_nome: textoTipo,
                        contato: this.novoContatoValor
                    });

                    // Limpa campos
                    this.novoTipoId = '';
                    this.novoContatoValor = '';
                    this.erro = '';
                },

                remover(index) {
                    this.lista.splice(index, 1);
                }
            }
        }
    </script>




</x-app-layout>
