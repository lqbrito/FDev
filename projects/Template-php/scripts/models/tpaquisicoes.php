<?php
	include_once('../parent/model.php');

    class tpaquisicoesModel extends Model
    {
        protected $table = 'tpaquisicoes';

        protected $fillable = [
            'id_cli', 'id_', 'descricao', 
        ];
    }
