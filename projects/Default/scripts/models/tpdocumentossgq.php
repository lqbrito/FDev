<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tpdocumentossgq extends Model
{
    protected $table = 'tpdocumentossgq';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_', 'descricao', 
    ];
}
