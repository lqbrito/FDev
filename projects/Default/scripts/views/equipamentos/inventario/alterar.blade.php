@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Alteração de inventario</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/inventario') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>  <!-- card-header -->

            <div class="card-body">

                <form action='{{url("/inventario/alterando")}}' method="post">
                    
                    @csrf

                    <input type = "hidden" name = "id" value = "{{$inventario->id}}">
                    
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_cli'>id_cli</label>
                    		<input type='number' class='form-control' id='id_cli' name='id_cli' required='true' autofocus value='{{$inventario->id_cli}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_equipamento'>id_equipamento</label>
                    		<input type='number' class='form-control' id='id_equipamento' name='id_equipamento' required='true' value='{{$inventario->id_equipamento}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_'>id_</label>
                    		<input type='number' class='form-control' id='id_' name='id_' required='true' value='{{$inventario->id_}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='data_inicio'>data_inicio</label>
                    		<input type='date' class='form-control' id='data_inicio' name='data_inicio' required='true' value='{{$inventario->data_inicio}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='hora_inicio'>hora_inicio</label>
                    		<input type='time' class='form-control' id='hora_inicio' name='hora_inicio' required='true' value='{{$inventario->hora_inicio}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='data_fim'>data_fim</label>
                    		<input type='date' class='form-control' id='data_fim' name='data_fim' required='true' value='{{$inventario->data_fim}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='hora_fim'>hora_fim</label>
                    		<input type='time' class='form-control' id='hora_fim' name='hora_fim' required='true' value='{{$inventario->hora_fim}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_usuario_responsavel'>id_usuario_responsavel</label>
                    		<input type='number' class='form-control' id='id_usuario_responsavel' name='id_usuario_responsavel' required='true' value='{{$inventario->id_usuario_responsavel}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_lancamento'>id_lancamento</label>
                    		<input type='number' class='form-control' id='id_lancamento' name='id_lancamento' required='true' value='{{$inventario->id_lancamento}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_departamento'>id_departamento</label>
                    		<input type='number' class='form-control' id='id_departamento' name='id_departamento' required='true' value='{{$inventario->id_departamento}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_tpestado'>id_tpestado</label>
                    		<input type='number' class='form-control' id='id_tpestado' name='id_tpestado' required='true' value='{{$inventario->id_tpestado}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='concluida'>concluida</label>
                    		<input type='text' class='form-control' id='concluida' name='concluida' maxlength='1' value='{{$inventario->concluida}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='custo_materiais'>custo_materiais</label>
                    		<input type='text' class='form-control' id='custo_materiais' name='custo_materiais' value='{{$inventario->custo_materiais}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='custo_servicos'>custo_servicos</label>
                    		<input type='text' class='form-control' id='custo_servicos' name='custo_servicos' value='{{$inventario->custo_servicos}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_agente_servico_interno'>id_agente_servico_interno</label>
                    		<input type='number' class='form-control' id='id_agente_servico_interno' name='id_agente_servico_interno' value='{{$inventario->id_agente_servico_interno}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_agente_servico_externo'>id_agente_servico_externo</label>
                    		<input type='number' class='form-control' id='id_agente_servico_externo' name='id_agente_servico_externo' value='{{$inventario->id_agente_servico_externo}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='observacoes'>observacoes</label>
                    		<textarea class='form-control' rows='5' id='observacoes' name='observacoes'>value='{{$inventario->observacoes}}'</textarea>
                    	</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                            <a href="{{ url('/inventario') }}" class="btn btn-default" title="Fechar'"><i class="fas fa-undo"></i> Cancelar</i></a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</section>

@endsection