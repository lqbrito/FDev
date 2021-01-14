<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profissionais_designados extends Model
{
    protected $table = 'profissionais_designados';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_departamento', 'id_', 'nome', 'sexo', 'foto', 'email', 'login', 'senha', 'situacao', 
    ];
}
