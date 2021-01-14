<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fabricantes_fornecedores extends Model
{
    protected $table = 'fabricantes_fornecedores';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_', 'tipo_pessoa', 'cpf_cnpj', 'nome_razao_social', 'endereco', 'bairro', 'cep', 'id_cidade', 'www', 'email', 'ddd', 'fone1', 'fone2', 'contato', 'situacao', 
    ];
}
