<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bsc extends Model
{
    protected $table = 'bsc';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'descricao', 'idempresa', 'idgrupo', 'idsubgrupo', 'observacoes', 
    ];
}
