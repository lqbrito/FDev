<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pacientes extends Model
{
    protected $table = 'pacientes';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_', 'cpf', 'nome', 
    ];
}
