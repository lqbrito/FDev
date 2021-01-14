@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Listagem de equipamentos</h5>
                <div class="card-tools">
                    <a class="btn btn-tool btn-sm" href="{{url('/equipamentos/incluir')}}"></i>Incluir</a>
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/home') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <form action='{{url("/equipamentos/pesquisar")}}' method="post">   
                    <div class="input-group input-group-sm mb-3">
                        @csrf
                        <input type="text" class="form-control" id="textobusca" name="textobusca" placeholder="Procurar no equipamentos... (digite pelo menos {{$tamanhoStringBusca}} caracteres)" autofocus value="{{$textobusca}}">                    
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
                                <th scope='col'>codigo_interno</th>
                                <th scope='col'>nome_tecnico</th>
                                <th scope='col'>nome_comercial</th>
                                <th scope='col'>foto</th>
                                <th scope='col'>modelo</th>
                                <th scope='col'>ano_fabricacao</th>
                                <th scope='col'>nro_serie</th>
                                <th scope='col'>nro_lote</th>
                                <th scope='col'>id_tpequipamento</th>
                                <th scope='col'>id_fabricante</th>
                                <th scope='col'>id_tpaquisicao</th>
                                <th scope='col'>id_fornecedor</th>
                                <th scope='col'>id_tpuso</th>
                                <th scope='col'>id_tpestado</th>
                                <th scope='col'>data_hora_estado_atual</th>
                                <th scope='col'>id_departamento</th>
                                <th scope='col'>periodicidade_manutencoes</th>
                                <th scope='col'>condicao</th>
                                <th scope='col'>temperatura_media</th>
                                <th scope='col'>temperatura_minima</th>
                                <th scope='col'>temperatura_maxima</th>
                                <th scope='col'>umidade_media</th>
                                <th scope='col'>umidade_minima</th>
                                <th scope='col'>umidade_maxima</th>
                                <th scope='col'>preco</th>
                                <th scope='col'>observacoes</th>
                                <th scope='col'>created_at</th>
                                <th scope='col'>updated_at</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($equipamentos as $tp)
                            <tr>
                                <td>{{$tp->id}}</td>
                                <td>{{$tp->id_cli}}</td>
                                <td>{{$tp->id_}}</td>
                                <td>{{$tp->codigo_interno}}</td>
                                <td>{{$tp->nome_tecnico}}</td>
                                <td>{{$tp->nome_comercial}}</td>
                                <td>{{$tp->foto}}</td>
                                <td>{{$tp->modelo}}</td>
                                <td>{{$tp->ano_fabricacao}}</td>
                                <td>{{$tp->nro_serie}}</td>
                                <td>{{$tp->nro_lote}}</td>
                                <td>{{$tp->id_tpequipamento}}</td>
                                <td>{{$tp->id_fabricante}}</td>
                                <td>{{$tp->id_tpaquisicao}}</td>
                                <td>{{$tp->id_fornecedor}}</td>
                                <td>{{$tp->id_tpuso}}</td>
                                <td>{{$tp->id_tpestado}}</td>
                                <td>{{$tp->data_hora_estado_atual}}</td>
                                <td>{{$tp->id_departamento}}</td>
                                <td>{{$tp->periodicidade_manutencoes}}</td>
                                <td>{{$tp->condicao}}</td>
                                <td>{{$tp->temperatura_media}}</td>
                                <td>{{$tp->temperatura_minima}}</td>
                                <td>{{$tp->temperatura_maxima}}</td>
                                <td>{{$tp->umidade_media}}</td>
                                <td>{{$tp->umidade_minima}}</td>
                                <td>{{$tp->umidade_maxima}}</td>
                                <td>{{$tp->preco}}</td>
                                <td>{{$tp->observacoes}}</td>
                                <td>{{$tp->created_at}}</td>
                                <td>{{$tp->updated_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action='{{url("/equipamentos/consultar")}}' method="post">
                                            @csrf
                                            <input type = "hidden" name = "id" value = "{{$tp->id}}">
                                            <button type="submit" class="btn btn-sm btn-link"><i class="fas fa-search"></i> Consultar</button>
                                        </form>
                                        <form action='{{url("/equipamentos/alterar")}}' method="post">
                                            @csrf
                                            <input type = "hidden" name = "id" value = "{{$tp->id}}">
                                            <button type="submit" class="btn btn-sm btn-link"><i class="fas fa-edit"></i> Alterar</button>
                                        </form>
                                        <form action='{{url("/equipamentos/excluir")}}' method="post">
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
                    {!! $equipamentos->links() !!}
                    @endif
                    
                </div>

            </div>
        </div>
    </div>

</section>

@endsection