@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Inclusão de novo equipamentos</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/equipamentos') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <form action='{{url("/equipamentos/incluindo")}}' method="post">
                    
                    @csrf
                    
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_cli'>id_cli</label>
                    		<input type='number' class='form-control' id='id_cli' name='id_cli' required='true' autofocus>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_'>id_</label>
                    		<input type='number' class='form-control' id='id_' name='id_' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='codigo_interno'>codigo_interno</label>
                    		<input type='text' class='form-control' id='codigo_interno' name='codigo_interno' maxlength='20'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='nome_tecnico'>nome_tecnico</label>
                    		<input type='text' class='form-control' id='nome_tecnico' name='nome_tecnico' maxlength='50' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='nome_comercial'>nome_comercial</label>
                    		<input type='text' class='form-control' id='nome_comercial' name='nome_comercial' maxlength='50' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='foto'>foto</label>
                    		<input type='text' class='form-control' id='foto' name='foto' maxlength='40'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='modelo'>modelo</label>
                    		<input type='text' class='form-control' id='modelo' name='modelo' maxlength='20' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='ano_fabricacao'>ano_fabricacao</label>
                    		<input type='number' class='form-control' id='ano_fabricacao' name='ano_fabricacao'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='nro_serie'>nro_serie</label>
                    		<input type='text' class='form-control' id='nro_serie' name='nro_serie' maxlength='20' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='nro_lote'>nro_lote</label>
                    		<input type='text' class='form-control' id='nro_lote' name='nro_lote' maxlength='20' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_tpequipamento'>id_tpequipamento</label>
                    		<input type='number' class='form-control' id='id_tpequipamento' name='id_tpequipamento' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_fabricante'>id_fabricante</label>
                    		<input type='number' class='form-control' id='id_fabricante' name='id_fabricante' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_tpaquisicao'>id_tpaquisicao</label>
                    		<input type='number' class='form-control' id='id_tpaquisicao' name='id_tpaquisicao' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_fornecedor'>id_fornecedor</label>
                    		<input type='number' class='form-control' id='id_fornecedor' name='id_fornecedor' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_tpuso'>id_tpuso</label>
                    		<input type='number' class='form-control' id='id_tpuso' name='id_tpuso' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_tpestado'>id_tpestado</label>
                    		<input type='number' class='form-control' id='id_tpestado' name='id_tpestado' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='data_hora_estado_atual'>data_hora_estado_atual</label>
                    		<input type='text' class='form-control' id='data_hora_estado_atual' name='data_hora_estado_atual'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_departamento'>id_departamento</label>
                    		<input type='number' class='form-control' id='id_departamento' name='id_departamento' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='periodicidade_manutencoes'>periodicidade_manutencoes</label>
                    		<input type='number' class='form-control' id='periodicidade_manutencoes' name='periodicidade_manutencoes' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='condicao'>condicao</label>
                    		<input type='text' class='form-control' id='condicao' name='condicao' maxlength='1'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='temperatura_media'>temperatura_media</label>
                    		<input type='text' class='form-control' id='temperatura_media' name='temperatura_media'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='temperatura_minima'>temperatura_minima</label>
                    		<input type='text' class='form-control' id='temperatura_minima' name='temperatura_minima'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='temperatura_maxima'>temperatura_maxima</label>
                    		<input type='text' class='form-control' id='temperatura_maxima' name='temperatura_maxima'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='umidade_media'>umidade_media</label>
                    		<input type='text' class='form-control' id='umidade_media' name='umidade_media'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='umidade_minima'>umidade_minima</label>
                    		<input type='text' class='form-control' id='umidade_minima' name='umidade_minima'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='umidade_maxima'>umidade_maxima</label>
                    		<input type='text' class='form-control' id='umidade_maxima' name='umidade_maxima'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='preco'>preco</label>
                    		<input type='text' class='form-control' id='preco' name='preco'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='observacoes'>observacoes</label>
                    		<textarea class='form-control' rows='5' id='observacoes' name='observacoes'></textarea>
                    	</div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                            <a href="{{ url('/equipamentos') }}" class="btn btn-default" title="Fechar'"><i class="fas fa-undo"></i> Cancelar</i></a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

</section>

@endsection