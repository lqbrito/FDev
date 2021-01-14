@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Consulta de profissionais_designados</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/profissionais_designados') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
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
                            <dt class='col-sm-2 text-right'>id_departamento</dt>
                            <dd class='col-sm-10'>{{$tp->id_departamento}}</dd>
                            <dt class='col-sm-2 text-right'>id_</dt>
                            <dd class='col-sm-10'>{{$tp->id_}}</dd>
                            <dt class='col-sm-2 text-right'>nome</dt>
                            <dd class='col-sm-10'>{{$tp->nome}}</dd>
                            <dt class='col-sm-2 text-right'>sexo</dt>
                            <dd class='col-sm-10'>{{$tp->sexo}}</dd>
                            <dt class='col-sm-2 text-right'>foto</dt>
                            <dd class='col-sm-10'>{{$tp->foto}}</dd>
                            <dt class='col-sm-2 text-right'>email</dt>
                            <dd class='col-sm-10'>{{$tp->email}}</dd>
                            <dt class='col-sm-2 text-right'>login</dt>
                            <dd class='col-sm-10'>{{$tp->login}}</dd>
                            <dt class='col-sm-2 text-right'>senha</dt>
                            <dd class='col-sm-10'>{{$tp->senha}}</dd>
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
                    <form action='{{url("/profissionais_designados/alterar")}}' method="post">
                        @csrf
                        <input type = "hidden" name = "id" value = "{{$profissionais_designados->id}}">
                        <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i> Alterar</button>
                    </form>
                    
                    <form action='{{url("/profissionais_designados/excluir")}}' method="post">
                        @csrf
                        <input type = "hidden" name = "id" value = "{{$profissionais_designados->id}}">
                        <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fas fa-trash"></i> Excluir</button>
                    </form>
                    
                    <a href="{{ url('/profissionais_designados') }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-times"></i> Fechar</i></a>
                </div>

            </div>
        </div>
    </div>

</section>

@endsection