@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Consulta de fabricantes_fornecedores</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/fabricantes_fornecedores') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <dl class="row">
                            <dt class='col-sm-2 text-right'>id</dt>
                            <dd class='col-sm-10'>{{$tp->id}}</dd>
                            <dt class='col-sm-2 text-right'>id_cli</dt>
                            <dd class='col-sm-10'>{{$tp->id_cli}}</dd>
                            <dt class='col-sm-2 text-right'>id_</dt>
                            <dd class='col-sm-10'>{{$tp->id_}}</dd>
                            <dt class='col-sm-2 text-right'>tipo_pessoa</dt>
                            <dd class='col-sm-10'>{{$tp->tipo_pessoa}}</dd>
                            <dt class='col-sm-2 text-right'>cpf_cnpj</dt>
                            <dd class='col-sm-10'>{{$tp->cpf_cnpj}}</dd>
                            <dt class='col-sm-2 text-right'>nome_razao_social</dt>
                            <dd class='col-sm-10'>{{$tp->nome_razao_social}}</dd>
                            <dt class='col-sm-2 text-right'>endereco</dt>
                            <dd class='col-sm-10'>{{$tp->endereco}}</dd>
                            <dt class='col-sm-2 text-right'>bairro</dt>
                            <dd class='col-sm-10'>{{$tp->bairro}}</dd>
                            <dt class='col-sm-2 text-right'>cep</dt>
                            <dd class='col-sm-10'>{{$tp->cep}}</dd>
                            <dt class='col-sm-2 text-right'>id_cidade</dt>
                            <dd class='col-sm-10'>{{$tp->id_cidade}}</dd>
                            <dt class='col-sm-2 text-right'>www</dt>
                            <dd class='col-sm-10'>{{$tp->www}}</dd>
                            <dt class='col-sm-2 text-right'>email</dt>
                            <dd class='col-sm-10'>{{$tp->email}}</dd>
                            <dt class='col-sm-2 text-right'>ddd</dt>
                            <dd class='col-sm-10'>{{$tp->ddd}}</dd>
                            <dt class='col-sm-2 text-right'>fone1</dt>
                            <dd class='col-sm-10'>{{$tp->fone1}}</dd>
                            <dt class='col-sm-2 text-right'>fone2</dt>
                            <dd class='col-sm-10'>{{$tp->fone2}}</dd>
                            <dt class='col-sm-2 text-right'>contato</dt>
                            <dd class='col-sm-10'>{{$tp->contato}}</dd>
                            <dt class='col-sm-2 text-right'>situacao</dt>
                            <dd class='col-sm-10'>{{$tp->situacao}}</dd>
                            <dt class='col-sm-2 text-right'>created_at</dt>
                            <dd class='col-sm-10'>{{$tp->created_at}}</dd>
                            <dt class='col-sm-2 text-right'>updated_at</dt>
                            <dd class='col-sm-10'>{{$tp->updated_at}}</dd>
                        </dl>
                    </div>
                </div>

                <div class="btn-group">
                    <form action='{{url("/fabricantes_fornecedores/alterar")}}' method="post">
                        @csrf
                        <input type = "hidden" name = "id" value = "{{$fabricantes_fornecedores->id}}">
                        <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i> Alterar</button>
                    </form>
                    
                    <form action='{{url("/fabricantes_fornecedores/excluir")}}' method="post">
                        @csrf
                        <input type = "hidden" name = "id" value = "{{$fabricantes_fornecedores->id}}">
                        <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fas fa-trash"></i> Excluir</button>
                    </form>
                    
                    <a href="{{ url('/fabricantes_fornecedores') }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-times"></i> Fechar</i></a>
                </div>

            </div>
        </div>
    </div>

</section>

@endsection