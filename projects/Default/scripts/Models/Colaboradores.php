<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colaboradores extends Model
{
    protected $table = 'colaboradores';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'idusuario', 'idestruturaempresarial', 'name', 'rg', 'orgaoexpedidor', 'datanascimento', 'sexo', 'idcadastro', 'status', 'nivelvisao', 'acoes', 
    ];
}
