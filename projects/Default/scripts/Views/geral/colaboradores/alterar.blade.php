@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Alteração de colaboradores</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/colaboradores') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>  <!-- card-header -->

            <div class="card-body">

                <form action='{{url("/colaboradores/alterando")}}' method="post">
                    
                    @csrf

                    <input type = "hidden" name = "id" value = "{{$colaboradores->id}}">
                    
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='idusuario'>idusuario</label>
                    		<input type='number' class='form-control' id='idusuario' name='idusuario' required='true' autofocus value='{{$colaboradores->idusuario}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='idestruturaempresarial'>idestruturaempresarial</label>
                    		<input type='number' class='form-control' id='idestruturaempresarial' name='idestruturaempresarial' required='true' value='{{$colaboradores->idestruturaempresarial}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='name'>name</label>
                    		<input type='text' class='form-control' id='name' name='name' maxlength='255' required='true' value='{{$colaboradores->name}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='rg'>rg</label>
                    		<input type='text' class='form-control' id='rg' name='rg' maxlength='20' required='true' value='{{$colaboradores->rg}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='orgaoexpedidor'>orgaoexpedidor</label>
                    		<input type='text' class='form-control' id='orgaoexpedidor' name='orgaoexpedidor' maxlength='20' required='true' value='{{$colaboradores->orgaoexpedidor}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='datanascimento'>datanascimento</label>
                    		<input type='date' class='form-control' id='datanascimento' name='datanascimento' required='true' value='{{$colaboradores->datanascimento}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='sexo'>sexo</label>
                    		<input type='number' class='form-control' id='sexo' name='sexo' required='true' value='{{$colaboradores->sexo}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='idcadastro'>idcadastro</label>
                    		<input type='number' class='form-control' id='idcadastro' name='idcadastro' required='true' value='{{$colaboradores->idcadastro}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='status'>status</label>
                    		<input type='number' class='form-control' id='status' name='status' required='true' value='{{$colaboradores->status}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='nivelvisao'>nivelvisao</label>
                    		<input type='number' class='form-control' id='nivelvisao' name='nivelvisao' required='true' value='{{$colaboradores->nivelvisao}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='acoes'>acoes</label>
                    		<input type='number' class='form-control' id='acoes' name='acoes' required='true' value='{{$colaboradores->acoes}}'>
                    	</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                            <a href="{{ url('/colaboradores') }}" class="btn btn-default" title="Fechar"><i class="fas fa-undo"></i> Cancelar</i></a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</section>

@endsection