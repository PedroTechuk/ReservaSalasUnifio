<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Reserva extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = ['sala_id','reservado_por', 'hora_inicio', 'hora_fim'];


    public function sala(): HasOne
    {
        return $this->hasOne(Sala::class, 'id', 'sala_id');
    }
}
