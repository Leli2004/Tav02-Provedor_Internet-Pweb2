<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColaboradorAtendimento extends Model
{

    use HasFactory;

    protected $table = "colaborador_atendimento";

    protected $fillable = ['atendimento_id',
        'colaborador_id',
    ];

    protected $casts = [
        "atendimento_id"=>"integer",
        "colaborador_id"=>"integer",
    ];

    public function atendimento(){
        // n - n
        return $this->belongsToMany(Atendimento::class,
            'atendimento_id', 'id');
    }

    public function colaborador(){
        // n - n
        return $this->belongsToMany(Colaborador::class,
            'colaborador_id', 'id');
    }

}