<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidades extends Model
{
    protected $table = 'cidades';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'cidade', 'idestado', 
    ];
}
