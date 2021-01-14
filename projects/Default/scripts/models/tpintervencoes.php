<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tpintervencoes extends Model
{
    protected $table = 'tpintervencoes';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_', 'descricao', 'gera_os', 
    ];
}
