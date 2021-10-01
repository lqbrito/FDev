@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Listagem de dadoscadastrais</h5>
                <div class="card-tools">
                    <a class="btn btn-tool btn-sm" href="{{url('/dadoscadastrais/incluir')}}"></i>Incluir</a>
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/home') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover table-sm table-condensed">
                        <thead>
                            <tr>
                                <th scope='col'>id</th>
                                <th scope='col'>endereco</th>
                                <th scope='col'>numero</th>
                                <th scope='col'>quadra</th>
                                <th scope='col'>lote</th>
                                <th scope='col'>complemento</th>
                                <th scope='col'>bairro</th>
                                <th scope='col'>cep</th>
                                <th scope='col'>idcidade</th>
                                <th scope='col'>avatar</th>
                                <th scope='col'>created_at</th>
                                <th scope='col'>updated_at</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($dadoscadastrais as $tp)
                            <tr>
                                <td>{{$tp->id}}</td>
                                <td>{{$tp->endereco}}</td>
                                <td>{{$tp->numero}}</td>
                                <td>{{$tp->quadra}}</td>
                                <td>{{$tp->lote}}</td>
                                <td>{{$tp->complemento}}</td>
                                <td>{{$tp->bairro}}</td>
                                <td>{{$tp->cep}}</td>
                                <td>{{$tp->idcidade}}</td>
                                <td>{{$tp->avatar}}</td>
                                <td>{{$tp->created_at}}</td>
                                <td>{{$tp->updated_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action='{{url("/dadoscadastrais/consultar")}}' method="post">
                                            @csrf
                                            <input type = "hidden" name = "id" value = "{{$tp->id}}">
                                            <button type="submit" class="btn btn-sm btn-link"><i class="fas fa-search"></i> Consultar</button>
                                        </form>
                                        <form action='{{url("/dadoscadastrais/alterar")}}' method="post">
                                            @csrf
                                            <input type = "hidden" name = "id" value = "{{$tp->id}}">
                                            <button type="submit" class="btn btn-sm btn-link"><i class="fas fa-edit"></i> Alterar</button>
                                        </form>
                                        <form action='{{url("/dadoscadastrais/excluir")}}' method="post">
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
                    {!! $dadoscadastrais->links() !!}
                    @endif
                    
                </div>

            </div>
        </div>
    </div>

</section>

@endsection