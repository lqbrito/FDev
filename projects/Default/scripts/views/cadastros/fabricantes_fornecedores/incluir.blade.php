@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Inclusão de novo fabricantes_fornecedores</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/fabricantes_fornecedores') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <form action='{{url("/fabricantes_fornecedores/incluindo")}}' method="post">
                    
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
                    		<label class='bmd-label-floating' for='tipo_pessoa'>tipo_pessoa</label>
                    		<input type='text' class='form-control' id='tipo_pessoa' name='tipo_pessoa' maxlength='1' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='cpf_cnpj'>cpf_cnpj</label>
                    		<input type='text' class='form-control' id='cpf_cnpj' name='cpf_cnpj' maxlength='14' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='nome_razao_social'>nome_razao_social</label>
                    		<input type='text' class='form-control' id='nome_razao_social' name='nome_razao_social' maxlength='50' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='endereco'>endereco</label>
                    		<input type='text' class='form-control' id='endereco' name='endereco' maxlength='50' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='bairro'>bairro</label>
                    		<input type='text' class='form-control' id='bairro' name='bairro' maxlength='30' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='cep'>cep</label>
                    		<input type='text' class='form-control' id='cep' name='cep' maxlength='8' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='id_cidade'>id_cidade</label>
                    		<input type='number' class='form-control' id='id_cidade' name='id_cidade' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='www'>www</label>
                    		<input type='text' class='form-control' id='www' name='www' maxlength='35' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='email'>email</label>
                    		<input type='text' class='form-control' id='email' name='email' maxlength='35' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='ddd'>ddd</label>
                    		<input type='number' class='form-control' id='ddd' name='ddd' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='fone1'>fone1</label>
                    		<input type='text' class='form-control' id='fone1' name='fone1' maxlength='9' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='fone2'>fone2</label>
                    		<input type='text' class='form-control' id='fone2' name='fone2' maxlength='9' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='contato'>contato</label>
                    		<input type='text' class='form-control' id='contato' name='contato' maxlength='50' required='true'>
                    	</div>
                    </div>
                    <div class='row'>
                    	<div class='form-group col-6'>
                    		<label class='bmd-label-floating' for='situacao'>situacao</label>
                    		<input type='text' class='form-control' id='situacao' name='situacao' maxlength='1' required='true'>
                    	</div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                            <a href="{{ url('/fabricantes_fornecedores') }}" class="btn btn-default" title="Fechar'"><i class="fas fa-undo"></i> Cancelar</i></a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

</section>

@endsection