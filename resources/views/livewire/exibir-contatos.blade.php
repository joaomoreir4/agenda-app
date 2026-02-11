<div class="p-5 col-span-6 border border-gray-300 rounded-lg">
    <div class="grid grid-cols-12 gap-5 m-3">
        <div class="col-span-12">
            <h3 class="pb-3">Contatos:</h3>
            <ul>
                @foreach ($contatos as $index => $contato)
                <li wire:key="contato{{ $index }}">
                    <p>{{ $contato['tipo_nome'] }}: {{ $contato['contato'] }}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>       
</div>