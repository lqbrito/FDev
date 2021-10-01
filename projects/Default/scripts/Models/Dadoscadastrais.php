<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dadoscadastrais extends Model
{
    protected $table = 'dadoscadastrais';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'endereco', 'numero', 'quadra', 'lote', 'complemento', 'bairro', 'cep', 'idcidade', 'avatar', 
    ];
}
