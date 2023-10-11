<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "cliente";

    protected $fillable = ['nome',
        'cpf',
        'data_nacimento',
        'endereco',
        'plano_id',
    ];

    protected $casts = [
        "plano_id"=>"integer"
    ];

    public function plano(){
        return $this->belongsTo(Plano::class,
            'plano_id', 'id');
    }
}
