<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tpeventos_adversos extends Model
{
    protected $table = 'tpeventos_adversos';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_', 'descricao', 
    ];
}
