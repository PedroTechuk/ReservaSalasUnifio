<?php

use function Livewire\Volt\{state, layout, mount, rules, uses};

use App\Models\Sala;
use Mary\Traits\Toast;

uses([Toast::class]);

state(['nome_sala', 'unidade', 'unidades' => [], 'capacidade', 'deleted_at']);

mount(function () {
    $this->unidades = [['id' => '1', 'name' => 'Virginia Maringá'], ['id' => '5', 'name' => 'Virginia Refrigerados'], ['id' => '3', 'name' => 'Virginia Guarapuava'], ['id' => '7', 'name' => 'Virginia Ponta Grossa'], ['id' => '10', 'name' => 'Norte Pioneiro'], ['id' => '4', 'name' => 'Virginia Varejo'], ['id' => '6', 'name' => 'Comercial de bebidas']];
});

rules([
    'nome_sala' => ['required', 'string', 'max:255', 'min:3'],
    'unidade' => ['required', 'in_array:unidades.*'],
    'capacidade' => ['required', 'min:1', 'max:50'],
])->messages([
    'nome_sala.required' => 'O nome da sala não pode ser vazio.',
    'nome_sala.max' => 'O nome da sala não pode ser maior que 255 caracteres.',
    'nome_sala.min' => 'O nome da sala não pode ser menor que 3 caracteres.',
    'unidade.required' => 'É preciso selecionar uma unidade.',
    'capacidade.required' => 'Insira a quantidade máxima de pessoas.',
]);

$save = function () {
    $data = $this->validate();

    $sala_nova = Sala::create([
        'nome_sala' => $data['nome_sala'],
        'unidade' => $data['unidade'],
        'capacidade' => $data['capacidade'],
    ]);

    if (!$sala_nova) {
        $this->error('Erro ao salvar sala.');
    }

    $this->success('Sala salva com sucesso!');
};

layout('layouts.app');

?>

<div>
    <h1 class="font-bold text-2xl uppercase color">Cadastro de Sala</h1>

    <form wire:submit.prevent="save">
        <div class="flex flex-col justify-center gap-2">
            <x-input label="Nome da Sala" placeholder="Nome da sala..." icon="o-pencil" wire:model="nome_sala" />

            <x-select label="Unidade" icon="o-building-office-2" :options="$this->unidades" wire:model="unidade"
                placeholder="Selecione uma unidade" placeholder-value="0" />

            <x-input label="Capacidade de pessoas" type="number" icon="o-pencil" wire:model="capacidade" />

            <x-button label="SALVAR" class="btn-success btn-sm" type="submit" />
        </div>
    </form>
</div>
