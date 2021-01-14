@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Alteração de profissionais_designados</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/profissionais_designados') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>  <!-- card-header -->

            <div class="card-body">

                <form action='{{url("/profissionais_designados/alterando")}}' method="post">
                    
                    @csrf

                    <input type = "hidden" name = "id" value = "{{$profissionais_designados->id}}">
                    
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_cli'>id_cli</label>
                    		<input type='number' class='form-control' id='id_cli' name='id_cli' required='true' autofocus value='{{$profissionais_designados->id_cli}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_departamento'>id_departamento</label>
                    		<input type='number' class='form-control' id='id_departamento' name='id_departamento' required='true' value='{{$profissionais_designados->id_departamento}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_'>id_</label>
                    		<input type='number' class='form-control' id='id_' name='id_' required='true' value='{{$profissionais_designados->id_}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='nome'>nome</label>
                    		<input type='text' class='form-control' id='nome' name='nome' maxlength='50' required='true' value='{{$profissionais_designados->nome}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='sexo'>sexo</label>
                    		<input type='number' class='form-control' id='sexo' name='sexo' value='{{$profissionais_designados->sexo}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='foto'>foto</label>
                    		<input type='text' class='form-control' id='foto' name='foto' maxlength='40' value='{{$profissionais_designados->foto}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='email'>email</label>
                    		<input type='text' class='form-control' id='email' name='email' maxlength='35' required='true' value='{{$profissionais_designados->email}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='login'>login</label>
                    		<input type='text' class='form-control' id='login' name='login' maxlength='15' required='true' value='{{$profissionais_designados->login}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='senha'>senha</label>
                    		<input type='text' class='form-control' id='senha' name='senha' maxlength='64' value='{{$profissionais_designados->senha}}'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='situacao'>situacao</label>
                    		<input type='text' class='form-control' id='situacao' name='situacao' maxlength='1' required='true' value='{{$profissionais_designados->situacao}}'>
                    	</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                            <a href="{{ url('/profissionais_designados') }}" class="btn btn-default" title="Fechar'"><i class="fas fa-undo"></i> Cancelar</i></a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</section>

@endsection