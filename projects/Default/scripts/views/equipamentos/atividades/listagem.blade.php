@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Listagem de atividades</h5>
                <div class="card-tools">
                    <a class="btn btn-tool btn-sm" href="{{url('/atividades/incluir')}}"></i>Incluir</a>
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/home') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <form action='{{url("/atividades/pesquisar")}}' method="post">   
                    <div class="input-group input-group-sm mb-3">
                        @csrf
                        <input type="text" class="form-control" id="textobusca" name="textobusca" placeholder="Procurar no atividades... (digite pelo menos {{$tamanhoStringBusca}} caracteres)" autofocus value="{{$textobusca}}">                    
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
                                <th scope='col'>idusuariosolicitante</th>
                                <th scope='col'>oque</th>
                                <th scope='col'>porque</th>
                                <th scope='col'>onde_grupo</th>
                                <th scope='col'>onde_subgrupo</th>
                                <th scope='col'>onde_outralocalizacao</th>
                                <th scope='col'>datainicio</th>
                                <th scope='col'>horainicio</th>
                                <th scope='col'>datafim</th>
                                <th scope='col'>horafim</th>
                                <th scope='col'>idgrupo</th>
                                <th scope='col'>idsubgrupo</th>
                                <th scope='col'>idusuario</th>
                                <th scope='col'>como</th>
                                <th scope='col'>quanto</th>
                                <th scope='col'>percentualconclusao</th>
                                <th scope='col'>idempresa</th>
                                <th scope='col'>idfluxo</th>
                                <th scope='col'>situacao</th>
                                <th scope='col'>idusuarioquevalida</th>
                                <th scope='col'>observacoesquemexecuta</th>
                                <th scope='col'>observacoesquemvalida</th>
                                <th scope='col'>created_at</th>
                                <th scope='col'>updated_at</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($atividades as $tp)
                            <tr>
                                <td>{{$tp->id}}</td>
                                <td>{{$tp->idusuariosolicitante}}</td>
                                <td>{{$tp->oque}}</td>
                                <td>{{$tp->porque}}</td>
                                <td>{{$tp->onde_grupo}}</td>
                                <td>{{$tp->onde_subgrupo}}</td>
                                <td>{{$tp->onde_outralocalizacao}}</td>
                                <td>{{$tp->datainicio}}</td>
                                <td>{{$tp->horainicio}}</td>
                                <td>{{$tp->datafim}}</td>
                                <td>{{$tp->horafim}}</td>
                                <td>{{$tp->idgrupo}}</td>
                                <td>{{$tp->idsubgrupo}}</td>
                                <td>{{$tp->idusuario}}</td>
                                <td>{{$tp->como}}</td>
                                <td>{{$tp->quanto}}</td>
                                <td>{{$tp->percentualconclusao}}</td>
                                <td>{{$tp->idempresa}}</td>
                                <td>{{$tp->idfluxo}}</td>
                                <td>{{$tp->situacao}}</td>
                                <td>{{$tp->idusuarioquevalida}}</td>
                                <td>{{$tp->observacoesquemexecuta}}</td>
                                <td>{{$tp->observacoesquemvalida}}</td>
                                <td>{{$tp->created_at}}</td>
                                <td>{{$tp->updated_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action='{{url("/atividades/consultar")}}' method="post">
                                            @csrf
                                            <input type = "hidden" name = "id" value = "{{$tp->id}}">
                                            <button type="submit" class="btn btn-sm btn-link"><i class="fas fa-search"></i> Consultar</button>
                                        </form>
                                        <form action='{{url("/atividades/alterar")}}' method="post">
                                            @csrf
                                            <input type = "hidden" name = "id" value = "{{$tp->id}}">
                                            <button type="submit" class="btn btn-sm btn-link"><i class="fas fa-edit"></i> Alterar</button>
                                        </form>
                                        <form action='{{url("/atividades/excluir")}}' method="post">
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
                    {!! $atividades->links() !!}
                    @endif
                    
                </div>

            </div>
        </div>
    </div>

</section>

@endsection