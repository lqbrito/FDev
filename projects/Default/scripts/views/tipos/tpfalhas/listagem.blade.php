@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Listagem de tpfalhas</h5>
                <div class="card-tools">
                    <a class="btn btn-tool btn-sm" href="{{url('/tpfalhas/incluir')}}"></i>Incluir</a>
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/home') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <form action='{{url("/tpfalhas/pesquisar")}}' method="post">   
                    <div class="input-group input-group-sm mb-3">
                        @csrf
                        <input type="text" class="form-control" id="textobusca" name="textobusca" placeholder="Procurar no tpfalhas... (digite pelo menos {{$tamanhoStringBusca}} caracteres)" autofocus value="{{$textobusca}}">                    
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
                                <th scope='col'>descricao</th>
                                <th scope='col'>created_at</th>
                                <th scope='col'>updated_at</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($tpfalhas as $tp)
                            <tr>
                                <td>{{$tp->id}}</td>
                                <td>{{$tp->id_cli}}</td>
                                <td>{{$tp->id_}}</td>
                                <td>{{$tp->descricao}}</td>
                                <td>{{$tp->created_at}}</td>
                                <td>{{$tp->updated_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action='{{url("/tpfalhas/consultar")}}' method="post">
                                            @csrf
                                            <input type = "hidden" name = "id" value = "{{$tp->id}}">
                                            <button type="submit" class="btn btn-sm btn-link"><i class="fas fa-search"></i> Consultar</button>
                                        </form>
                                        <form action='{{url("/tpfalhas/alterar")}}' method="post">
                                            @csrf
                                            <input type = "hidden" name = "id" value = "{{$tp->id}}">
                                            <button type="submit" class="btn btn-sm btn-link"><i class="fas fa-edit"></i> Alterar</button>
                                        </form>
                                        <form action='{{url("/tpfalhas/excluir")}}' method="post">
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
                    {!! $tpfalhas->links() !!}
                    @endif
                    
                </div>

            </div>
        </div>
    </div>

</section>

@endsection