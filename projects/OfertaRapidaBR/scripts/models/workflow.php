<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class workflow extends Model
{
    protected $table = 'workflow';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'descricao', 'observacoes', 'idempresa', 
    ];
}
