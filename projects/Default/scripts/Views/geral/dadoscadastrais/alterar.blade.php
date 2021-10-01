@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Alteração de dadoscadastrais</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/dadoscadastrais') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>  <!-- card-header -->

            <div class="card-body">

                <form action='{{url("/dadoscadastrais/alterando")}}' method="post">
                    
                    @csrf

                    <input type = "hidden" name = "id" value = "{{$dadoscadastrais->id}}">
                    
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='endereco'>endereco</label>
                    		<input type='text' class='form-control' id='endereco' name='endereco' maxlength='80' autofocus value='{{$dadoscadastrais->endereco}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='numero'>numero</label>
                    		<input type='text' class='form-control' id='numero' name='numero' maxlength='10' value='{{$dadoscadastrais->numero}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='quadra'>quadra</label>
                    		<input type='text' class='form-control' id='quadra' name='quadra' maxlength='10' value='{{$dadoscadastrais->quadra}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='lote'>lote</label>
                    		<input type='text' class='form-control' id='lote' name='lote' maxlength='10' value='{{$dadoscadastrais->lote}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='complemento'>complemento</label>
                    		<input type='text' class='form-control' id='complemento' name='complemento' maxlength='80' value='{{$dadoscadastrais->complemento}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='bairro'>bairro</label>
                    		<input type='text' class='form-control' id='bairro' name='bairro' maxlength='50' value='{{$dadoscadastrais->bairro}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='cep'>cep</label>
                    		<input type='text' class='form-control' id='cep' name='cep' maxlength='8' value='{{$dadoscadastrais->cep}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='idcidade'>idcidade</label>
                    		<input type='number' class='form-control' id='idcidade' name='idcidade' required='true' value='{{$dadoscadastrais->idcidade}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='avatar'>avatar</label>
                    		<input type='text' class='form-control' id='avatar' name='avatar' maxlength='255' value='{{$dadoscadastrais->avatar}}'>
                    	</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                            <a href="{{ url('/dadoscadastrais') }}" class="btn btn-default" title="Fechar"><i class="fas fa-undo"></i> Cancelar</i></a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</section>

@endsection