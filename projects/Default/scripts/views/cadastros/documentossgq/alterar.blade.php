@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Alteração de documentossgq</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/documentossgq') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>  <!-- card-header -->

            <div class="card-body">

                <form action='{{url("/documentossgq/alterando")}}' method="post">
                    
                    @csrf

                    <input type = "hidden" name = "id" value = "{{$documentossgq->id}}">
                    
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_cli'>id_cli</label>
                    		<input type='number' class='form-control' id='id_cli' name='id_cli' required='true' autofocus value='{{$documentossgq->id_cli}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_'>id_</label>
                    		<input type='number' class='form-control' id='id_' name='id_' required='true' value='{{$documentossgq->id_}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='descricao'>descricao</label>
                    		<input type='text' class='form-control' id='descricao' name='descricao' maxlength='50' value='{{$documentossgq->descricao}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_tpdocumentossgq'>id_tpdocumentossgq</label>
                    		<input type='number' class='form-control' id='id_tpdocumentossgq' name='id_tpdocumentossgq' required='true' value='{{$documentossgq->id_tpdocumentossgq}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='nomedoc'>nomedoc</label>
                    		<input type='text' class='form-control' id='nomedoc' name='nomedoc' maxlength='50' value='{{$documentossgq->nomedoc}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='localizacao_documentacao'>localizacao_documentacao</label>
                    		<input type='text' class='form-control' id='localizacao_documentacao' name='localizacao_documentacao' maxlength='80' value='{{$documentossgq->localizacao_documentacao}}'>
                    	</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                            <a href="{{ url('/documentossgq') }}" class="btn btn-default" title="Fechar'"><i class="fas fa-undo"></i> Cancelar</i></a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</section>

@endsection