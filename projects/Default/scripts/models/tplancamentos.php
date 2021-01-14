<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tplancamentos extends Model
{
    protected $table = 'tplancamentos';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_', 'id_tpintervencao', 'descricao_lancamento', 
    ];
}
