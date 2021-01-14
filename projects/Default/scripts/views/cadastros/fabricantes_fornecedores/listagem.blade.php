@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Listagem de fabricantes_fornecedores</h5>
                <div class="card-tools">
                    <a class="btn btn-tool btn-sm" href="{{url('/fabricantes_fornecedores/incluir')}}"></i>Incluir</a>
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/home') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <form action='{{url("/fabricantes_fornecedores/pesquisar")}}' method="post">   
                    <div class="input-group input-group-sm mb-3">
                        @csrf
                        <input type="text" class="form-control" id="textobusca" name="textobusca" placeholder="Procurar no fabricantes_fornecedores... (digite pelo menos {{$tamanhoStringBusca}} caracteres)" autofocus value="{{$textobusca}}">                    
                        <span class="input-group-append">
                            <button type = "submit" class="btn btn-primary btn-flat" id="pesquisar" name = "pesquisar"><i class="fa fa-search"></i> Pesquisar</button>
                        </span>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-hover table-sm table-condensed">
                        <thead>
                            <tr>
                                <th scope='col'>id</th>
                                <th scope='col'>id_cli</th>
                                <th scope='col'>id_</th>
                                <th scope='col'>tipo_pessoa</th>
                                <th scope='col'>cpf_cnpj</th>
                                <th scope='col'>nome_razao_social</th>
                                <th scope='col'>endereco</th>
                                <th scope='col'>bairro</th>
                                <th scope='col'>cep</th>
                                <th scope='col'>id_cidade</th>
                                <th scope='col'>www</th>
                                <th scope='col'>email</th>
                                <th scope='col'>ddd</th>
                                <th scope='col'>fone1</th>
                                <th scope='col'>fone2</th>
                                <th scope='col'>contato</th>
                                <th scope='col'>situacao</th>
                                <th scope='col'>created_at</th>
                                <th scope='col'>updated_at</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($fabricantes_fornecedores as $tp)
                            <tr>
                                <td>{{$tp->id}}</td>
                                <td>{{$tp->id_cli}}</td>
                                <td>{{$tp->id_}}</td>
                                <td>{{$tp->tipo_pessoa}}</td>
                                <td>{{$tp->cpf_cnpj}}</td>
                                <td>{{$tp->nome_razao_social}}</td>
                                <td>{{$tp->endereco}}</td>
                                <td>{{$tp->bairro}}</td>
                                <td>{{$tp->cep}}</td>
                                <td>{{$tp->id_cidade}}</td>
                                <td>{{$tp->www}}</td>
                                <td>{{$tp->email}}</td>
                                <td>{{$tp->ddd}}</td>
                                <td>{{$tp->fone1}}</td>
                                <td>{{$tp->fone2}}</td>
                                <td>{{$tp->contato}}</td>
                                <td>{{$tp->situacao}}</td>
                                <td>{{$tp->created_at}}</td>
                                <td>{{$tp->updated_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action='{{url("/fabricantes_fornecedores/consultar")}}' method="post">
                                            @csrf
                                            <input type = "hidden" name = "id" value = "{{$tp->id}}">
                                            <button type="submit" class="btn btn-sm btn-link"><i class="fas fa-search"></i> Consultar</button>
                                        </form>
                                        <form action='{{url("/fabricantes_fornecedores/alterar")}}' method="post">
                                            @csrf
                                            <input type = "hidden" name = "id" value = "{{$tp->id}}">
                                            <button type="submit" class="btn btn-sm btn-link"><i class="fas fa-edit"></i> Alterar</button>
                                        </form>
                                        <form action='{{url("/fabricantes_fornecedores/excluir")}}' method="post">
                                            @csrf
                                            <input type = "hidden" name = "id" value = "{{$tp->id}}">
                                            <button type="submit" class="btn btn-sm btn-link"><i class="fas fa-trash"></i> Excluir</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if (!$listaTudo)
                    {!! $fabricantes_fornecedores->links() !!}
                    @endif
                    
                </div>

            </div>
        </div>
    </div>

</section>

@endsection