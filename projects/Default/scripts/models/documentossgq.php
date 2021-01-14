<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class documentossgq extends Model
{
    protected $table = 'documentossgq';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_', 'descricao', 'id_tpdocumentossgq', 'nomedoc', 'localizacao_documentacao', 
    ];
}
