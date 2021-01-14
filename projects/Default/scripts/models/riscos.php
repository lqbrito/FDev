<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class riscos extends Model
{
    protected $table = 'riscos';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_', 'descricao', 
    ];
}
