<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;

    protected $table = "atendimento";

    protected $fillable = ['cliente_id',
        'setor_id',
        'tipo',
        'descricao',
        'data',
        'hora',
    ];

    protected $casts = [
        "cliente_id"=>"integer",
        "setor_id"=>"integer",
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class,
            'cliente_id', 'id');
    }

    public function setor(){
        return $this->belongsTo(Setor::class,
            'setor_id', 'id');
    }
}
