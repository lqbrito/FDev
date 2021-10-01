<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $table = 'estados';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'estado', 'sigla', 
    ];
}
