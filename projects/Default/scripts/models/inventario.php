<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inventario extends Model
{
    protected $table = 'inventario';
    //protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [
        'id_cli', 'id_equipamento', 'id_', 'data_inicio', 'hora_inicio', 'data_fim', 'hora_fim', 'id_usuario_responsavel', 'id_lancamento', 'id_departamento', 'id_tpestado', 'concluida', 'custo_materiais', 'custo_servicos', 'id_agente_servico_interno', 'id_agente_servico_externo', 'observacoes', 
    ];
}
