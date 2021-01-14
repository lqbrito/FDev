<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tpestados extends Model
{
    protected $table = 'tpestados';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_', 'descricao', 'em_uso', 
    ];
}
