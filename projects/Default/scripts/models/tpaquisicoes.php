<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tpaquisicoes extends Model
{
    protected $table = 'tpaquisicoes';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_', 'descricao', 
    ];
}
