<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cidades extends Model
{
    protected $table = 'cidades';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'nome', 'uf', 'codigoibge', 'ddd', 
    ];
}
