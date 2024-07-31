<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sala extends Model
{
    use HasFactory, SoftDeletes;

    // protected $table = 'nome_da_tabela_aqui';

    protected $fillable = ['nome_sala', 'unidade', 'capacidade', 'ativo', 'deleted_at'];
}

