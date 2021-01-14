@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Inclusão de novo atividades</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/atividades') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <form action='{{url("/atividades/incluindo")}}' method="post">
                    
                    @csrf
                    
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='idusuariosolicitante'>idusuariosolicitante</label>
                    		<input type='number' class='form-control' id='idusuariosolicitante' name='idusuariosolicitante' required='true' autofocus>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='oque'>oque</label>
                    		<input type='text' class='form-control' id='oque' name='oque' maxlength='80' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='porque'>porque</label>
                    		<input type='text' class='form-control' id='porque' name='porque' maxlength='100' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='onde_grupo'>onde_grupo</label>
                    		<input type='number' class='form-control' id='onde_grupo' name='onde_grupo'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='onde_subgrupo'>onde_subgrupo</label>
                    		<input type='number' class='form-control' id='onde_subgrupo' name='onde_subgrupo'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='onde_outralocalizacao'>onde_outralocalizacao</label>
                    		<input type='number' class='form-control' id='onde_outralocalizacao' name='onde_outralocalizacao'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='datainicio'>datainicio</label>
                    		<input type='date' class='form-control' id='datainicio' name='datainicio'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='horainicio'>horainicio</label>
                    		<input type='time' class='form-control' id='horainicio' name='horainicio'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='datafim'>datafim</label>
                    		<input type='date' class='form-control' id='datafim' name='datafim' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='horafim'>horafim</label>
                    		<input type='time' class='form-control' id='horafim' name='horafim'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='idgrupo'>idgrupo</label>
                    		<input type='number' class='form-control' id='idgrupo' name='idgrupo'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='idsubgrupo'>idsubgrupo</label>
                    		<input type='number' class='form-control' id='idsubgrupo' name='idsubgrupo'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='idusuario'>idusuario</label>
                    		<input type='number' class='form-control' id='idusuario' name='idusuario'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='como'>como</label>
                    		<textarea class='form-control' rows='5' id='como' name='como'></textarea>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='quanto'>quanto</label>
                    		<input type='text' class='form-control' id='quanto' name='quanto' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='percentualconclusao'>percentualconclusao</label>
                    		<input type='number' class='form-control' id='percentualconclusao' name='percentualconclusao' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='idempresa'>idempresa</label>
                    		<input type='number' class='form-control' id='idempresa' name='idempresa'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='idfluxo'>idfluxo</label>
                    		<input type='number' class='form-control' id='idfluxo' name='idfluxo'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='situacao'>situacao</label>
                    		<input type='number' class='form-control' id='situacao' name='situacao' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='idusuarioquevalida'>idusuarioquevalida</label>
                    		<input type='number' class='form-control' id='idusuarioquevalida' name='idusuarioquevalida'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='observacoesquemexecuta'>observacoesquemexecuta</label>
                    		<textarea class='form-control' rows='5' id='observacoesquemexecuta' name='observacoesquemexecuta'></textarea>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='observacoesquemvalida'>observacoesquemvalida</label>
                    		<textarea class='form-control' rows='5' id='observacoesquemvalida' name='observacoesquemvalida'></textarea>
                    	</div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                            <a href="{{ url('/atividades') }}" class="btn btn-default" title="Fechar'"><i class="fas fa-undo"></i> Cancelar</i></a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

</section>

@endsection