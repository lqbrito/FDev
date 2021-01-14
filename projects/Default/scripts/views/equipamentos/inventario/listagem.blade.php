@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Listagem de inventario</h5>
                <div class="card-tools">
                    <a class="btn btn-tool btn-sm" href="{{url('/inventario/incluir')}}"></i>Incluir</a>
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/home') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <form action='{{url("/inventario/pesquisar")}}' method="post">   
                    <div class="input-group input-group-sm mb-3">
                        @csrf
                        <input type="text" class="form-control" id="textobusca" name="textobusca" placeholder="Procurar no inventario... (digite pelo menos {{$tamanhoStringBusca}} caracteres)" autofocus value="{{$textobusca}}">                    
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
                                <th scope='col'>id_equipamento</th>
                                <th scope='col'>id_</th>
                                <th scope='col'>data_inicio</th>
                                <th scope='col'>hora_inicio</th>
                                <th scope='col'>data_fim</th>
                                <th scope='col'>hora_fim</th>
                                <th scope='col'>id_usuario_responsavel</th>
                                <th scope='col'>id_lancamento</th>
                                <th scope='col'>id_departamento</th>
                                <th scope='col'>id_tpestado</th>
                                <th scope='col'>concluida</th>
                                <th scope='col'>custo_materiais</th>
                                <th scope='col'>custo_servicos</th>
                                <th scope='col'>id_agente_servico_interno</th>
                                <th scope='col'>id_agente_servico_externo</th>
                                <th scope='col'>observacoes</th>
                                <th scope='col'>created_at</th>
                                <th scope='col'>updated_at</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($inventario as $tp)
                            <tr>
                                <td>{{$tp->id}}</td>
                                <td>{{$tp->id_cli}}</td>
                                <td>{{$tp->id_equipamento}}</td>
                                <td>{{$tp->id_}}</td>
                                <td>{{$tp->data_inicio}}</td>
                                <td>{{$tp->hora_inicio}}</td>
                                <td>{{$tp->data_fim}}</td>
                                <td>{{$tp->hora_fim}}</td>
                                <td>{{$tp->id_usuario_responsavel}}</td>
                                <td>{{$tp->id_lancamento}}</td>
                                <td>{{$tp->id_departamento}}</td>
                                <td>{{$tp->id_tpestado}}</td>
                                <td>{{$tp->concluida}}</td>
                                <td>{{$tp->custo_materiais}}</td>
                                <td>{{$tp->custo_servicos}}</td>
                                <td>{{$tp->id_agente_servico_interno}}</td>
                                <td>{{$tp->id_agente_servico_externo}}</td>
                                <td>{{$tp->observacoes}}</td>
                                <td>{{$tp->created_at}}</td>
                                <td>{{$tp->updated_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action='{{url("/inventario/consultar")}}' method="post">
                                            @csrf
                                            <input type = "hidden" name = "id" value = "{{$tp->id}}">
                                            <button type="submit" class="btn btn-sm btn-link"><i class="fas fa-search"></i> Consultar</button>
                                        </form>
                                        <form action='{{url("/inventario/alterar")}}' method="post">
                                            @csrf
                                            <input type = "hidden" name = "id" value = "{{$tp->id}}">
                                            <button type="submit" class="btn btn-sm btn-link"><i class="fas fa-edit"></i> Alterar</button>
                                        </form>
                                        <form action='{{url("/inventario/excluir")}}' method="post">
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
                    {!! $inventario->links() !!}
                    @endif
                    
                </div>

            </div>
        </div>
    </div>

</section>

@endsection