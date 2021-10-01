<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estruturaempresarial extends Model
{
    protected $table = 'estruturaempresarial';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'tipo', 'idpai', 'nome01', 'nome02', 'idcadastro', 
    ];
}
