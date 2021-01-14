<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tpusos extends Model
{
    protected $table = 'tpusos';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_', 'descricao', 
    ];
}
