<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tpequipamentos extends Model
{
    protected $table = 'tpequipamentos';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_', 'descricao', 
    ];
}
