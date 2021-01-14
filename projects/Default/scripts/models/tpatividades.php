<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tpatividades extends Model
{
    protected $table = 'tpatividades';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_', 'descricao', 
    ];
}
