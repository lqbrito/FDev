<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class atividades extends Model
{
    protected $table = 'atividades';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'idusuariosolicitante', 'oque', 'porque', 'onde_grupo', 'onde_subgrupo', 'onde_outralocalizacao', 'datainicio', 'horainicio', 'datafim', 'horafim', 'idgrupo', 'idsubgrupo', 'idusuario', 'como', 'quanto', 'percentualconclusao', 'idempresa', 'idfluxo', 'situacao', 'idusuarioquevalida', 'observacoesquemexecuta', 'observacoesquemvalida', 
    ];
}
