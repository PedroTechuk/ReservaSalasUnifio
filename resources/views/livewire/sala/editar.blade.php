<?php

use function Livewire\Volt\{state, layout, mount, rules, uses};

use App\Models\Sala;
use Mary\Traits\Toast;


layout('layouts.app');

state(['salas' => []]);
state(['id'=>[url->()]]);


mount(function () {
    $this->salas = Sala::where('ativo', true)->get();
});


?>

<div>

    <h1 class="font-bold text-2xl uppercase color">Editar</h1>

    <form wire:submit.prevent="edit">
        <div class="flex flex-col justify-center gap-2">
            <x-input label="Nome da Sala" placeholder="Nome da sala..." icon="o-pencil" wire:model="nome_sala" />

            <x-select label="Unidade" icon="o-building-office-2" :options="$this->unidades" wire:model="unidade"
                placeholder="Selecione uma unidade" placeholder-value="0" />

            <x-input label="Capacidade de pessoas" type="number" icon="o-pencil" wire:model="capacidade" />

            <x-button label="Editar" class="btn-success btn-sm" type="submit" />
        </div>
    </form>
    
</div>
