<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class departamentos extends Model
{
    protected $table = 'departamentos';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_', 'descricao', 
    ];
}
