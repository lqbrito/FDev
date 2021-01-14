<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class equipamentos extends Model
{
    protected $table = 'equipamentos';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_', 'codigo_interno', 'nome_tecnico', 'nome_comercial', 'foto', 'modelo', 'ano_fabricacao', 'nro_serie', 'nro_lote', 'id_tpequipamento', 'id_fabricante', 'id_tpaquisicao', 'id_fornecedor', 'id_tpuso', 'id_tpestado', 'data_hora_estado_atual', 'id_departamento', 'periodicidade_manutencoes', 'condicao', 'temperatura_media', 'temperatura_minima', 'temperatura_maxima', 'umidade_media', 'umidade_minima', 'umidade_maxima', 'preco', 'observacoes', 
    ];
}
