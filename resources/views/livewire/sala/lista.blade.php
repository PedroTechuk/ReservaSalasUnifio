<?php

use function Livewire\Volt\{state, layout, mount, rules, uses};

use App\Models\Sala;
use Mary\Traits\Toast;

layout('layouts.app');

uses([Toast::class]);

state(['salas' => []]);

mount(function () {
    // $this->salas = Sala::where('ativo', true)->get();
    $this->salas = Sala::withTrashed()->get();
});

$delete = function ($id) {
    $sala = Sala::find($id);

    $sala->delete();

    $this->success('Sala deletada!');

    // esse aparece ate os deletados
    // $this->salas = Sala::withTrashed()->get();

    // esse apenas os ativos
    // $this->salas = Sala::->get();
};

$restore = function ($id) {
    $sala = Sala::withTrashed()->find($id);

    $sala->restore();

    $this->success('Sala reativada!');
};

?>

<div>
    {{-- QRCODE: --}}
    {{-- <div class="grid grid-cols-5 gap-2">
        @foreach ($this->salas as $item)
            <div class="flex flex-col items-center rounded shadow ">
                <p>{{ $item->nome_sala }}</p>
                <img src="https://quickchart.io/chart?cht=qr&chs=1000x1000&chl=https://cloud.intranetvirginia.com.br/reserva?id={{ $item->id }}"
                    alt="">
            </div>
        @endforeach
    </div> --}}

    <h1 class="font-bold text-2xl uppercase color">Lista de Salas</h1><br />
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">    
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="py-2 border-b">ID</th>
                <th class="py-2 border-b">Nome da sala</th>
                <th class="py-2 border-b">Unidade</th>
                <th class="py-2 border-b">Status</th>
                <th class="py-2 border-b">Ações</th>

            </tr>
        </thead>
        <tbody class="text-gray-800">
            @forelse ($this->salas as $sala)
                <tr class="hover:bg-slate-50">
                    <td class="py-2 px-4 border-b text-center ">{{ $sala->id }}</td>
                    <td class="py-2 px-4 border-b text-center ">{{ $sala->nome_sala }}</td>
                    <td class="py-2 px-4 border-b text-center ">{{ $sala->unidade }}</td>
                    <td class="py-2 px-4 border-b text-center ">{{ $sala->deleted_at == null ? 'Ativo' : 'Inativo' }}
                    </td>
                    <td class="py-2 px-4 border-b text-center ">

                        <x-button icon="o-pencil" class="btn-sm btn-outline"
                            link="{{ route('sala.editar', ['id' => $sala->id]) }}" />

                        @if (!$sala->deleted_at)

                            <x-button icon="o-trash" class="btn-sm btn-outline"
                                wire:click="delete({{ $sala->id }})" />
                        @else

                        <x-button label="" icon="o-check" class="btn-success"
                        tooltip="Ativar novamente essa sala." wire:click="restore({{ $sala->id }})" />

                        @endif
                    </td>

                </tr>
            @empty
                <td class="py-2 px-4 border-b text-center ">Não há salas cadastradas.</td>
            @endforelse
        </tbody>
    </table>
</div>
