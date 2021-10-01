@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Listagem de colaboradores</h5>
                <div class="card-tools">
                    <a class="btn btn-tool btn-sm" href="{{url('/colaboradores/incluir')}}"></i>Incluir</a>
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
                                <th scope='col'>idusuario</th>
                                <th scope='col'>idestruturaempresarial</th>
                                <th scope='col'>name</th>
                                <th scope='col'>rg</th>
                                <th scope='col'>orgaoexpedidor</th>
                                <th scope='col'>datanascimento</th>
                                <th scope='col'>sexo</th>
                                <th scope='col'>idcadastro</th>
                                <th scope='col'>status</th>
                                <th scope='col'>nivelvisao</th>
                                <th scope='col'>acoes</th>
                                <th scope='col'>created_at</th>
                                <th scope='col'>updated_at</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($colaboradores as $tp)
                            <tr>
                                <td>{{$tp->id}}</td>
                                <td>{{$tp->idusuario}}</td>
                                <td>{{$tp->idestruturaempresarial}}</td>
                                <td>{{$tp->name}}</td>
                                <td>{{$tp->rg}}</td>
                                <td>{{$tp->orgaoexpedidor}}</td>
                                <td>{{$tp->datanascimento}}</td>
                                <td>{{$tp->sexo}}</td>
                                <td>{{$tp->idcadastro}}</td>
                                <td>{{$tp->status}}</td>
                                <td>{{$tp->nivelvisao}}</td>
                                <td>{{$tp->acoes}}</td>
                                <td>{{$tp->created_at}}</td>
                                <td>{{$tp->updated_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action='{{url("/colaboradores/consultar")}}' method="post">
                                            @csrf
                                            <input type = "hidden" name = "id" value = "{{$tp->id}}">
                                            <button type="submit" class="btn btn-sm btn-link"><i class="fas fa-search"></i> Consultar</button>
                                        </form>
                                        <form action='{{url("/colaboradores/alterar")}}' method="post">
                                            @csrf
                                            <input type = "hidden" name = "id" value = "{{$tp->id}}">
                                            <button type="submit" class="btn btn-sm btn-link"><i class="fas fa-edit"></i> Alterar</button>
                                        </form>
                                        <form action='{{url("/colaboradores/excluir")}}' method="post">
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
                    {!! $colaboradores->links() !!}
                    @endif
                    
                </div>

            </div>
        </div>
    </div>

</section>

@endsection