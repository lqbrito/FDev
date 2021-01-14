@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Consulta de atividades</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/atividades') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <dl class="row">
                            <dt class='col-sm-2 text-right'>id</dt>
                            <dd class='col-sm-10'>{{$tp->id}}</dd>
                            <dt class='col-sm-2 text-right'>idusuariosolicitante</dt>
                            <dd class='col-sm-10'>{{$tp->idusuariosolicitante}}</dd>
                            <dt class='col-sm-2 text-right'>oque</dt>
                            <dd class='col-sm-10'>{{$tp->oque}}</dd>
                            <dt class='col-sm-2 text-right'>porque</dt>
                            <dd class='col-sm-10'>{{$tp->porque}}</dd>
                            <dt class='col-sm-2 text-right'>onde_grupo</dt>
                            <dd class='col-sm-10'>{{$tp->onde_grupo}}</dd>
                            <dt class='col-sm-2 text-right'>onde_subgrupo</dt>
                            <dd class='col-sm-10'>{{$tp->onde_subgrupo}}</dd>
                            <dt class='col-sm-2 text-right'>onde_outralocalizacao</dt>
                            <dd class='col-sm-10'>{{$tp->onde_outralocalizacao}}</dd>
                            <dt class='col-sm-2 text-right'>datainicio</dt>
                            <dd class='col-sm-10'>{{$tp->datainicio}}</dd>
                            <dt class='col-sm-2 text-right'>horainicio</dt>
                            <dd class='col-sm-10'>{{$tp->horainicio}}</dd>
                            <dt class='col-sm-2 text-right'>datafim</dt>
                            <dd class='col-sm-10'>{{$tp->datafim}}</dd>
                            <dt class='col-sm-2 text-right'>horafim</dt>
                            <dd class='col-sm-10'>{{$tp->horafim}}</dd>
                            <dt class='col-sm-2 text-right'>idgrupo</dt>
                            <dd class='col-sm-10'>{{$tp->idgrupo}}</dd>
                            <dt class='col-sm-2 text-right'>idsubgrupo</dt>
                            <dd class='col-sm-10'>{{$tp->idsubgrupo}}</dd>
                            <dt class='col-sm-2 text-right'>idusuario</dt>
                            <dd class='col-sm-10'>{{$tp->idusuario}}</dd>
                            <dt class='col-sm-2 text-right'>como</dt>
                            <dd class='col-sm-10'>{{$tp->como}}</dd>
                            <dt class='col-sm-2 text-right'>quanto</dt>
                            <dd class='col-sm-10'>{{$tp->quanto}}</dd>
                            <dt class='col-sm-2 text-right'>percentualconclusao</dt>
                            <dd class='col-sm-10'>{{$tp->percentualconclusao}}</dd>
                            <dt class='col-sm-2 text-right'>idempresa</dt>
                            <dd class='col-sm-10'>{{$tp->idempresa}}</dd>
                            <dt class='col-sm-2 text-right'>idfluxo</dt>
                            <dd class='col-sm-10'>{{$tp->idfluxo}}</dd>
                            <dt class='col-sm-2 text-right'>situacao</dt>
                            <dd class='col-sm-10'>{{$tp->situacao}}</dd>
                            <dt class='col-sm-2 text-right'>idusuarioquevalida</dt>
                            <dd class='col-sm-10'>{{$tp->idusuarioquevalida}}</dd>
                            <dt class='col-sm-2 text-right'>observacoesquemexecuta</dt>
                            <dd class='col-sm-10'>{{$tp->observacoesquemexecuta}}</dd>
                            <dt class='col-sm-2 text-right'>observacoesquemvalida</dt>
                            <dd class='col-sm-10'>{{$tp->observacoesquemvalida}}</dd>
                            <dt class='col-sm-2 text-right'>created_at</dt>
                            <dd class='col-sm-10'>{{$tp->created_at}}</dd>
                            <dt class='col-sm-2 text-right'>updated_at</dt>
                            <dd class='col-sm-10'>{{$tp->updated_at}}</dd>
                        </dl>
                    </div>
                </div>

                <div class="btn-group">
                    <form action='{{url("/atividades/alterar")}}' method="post">
                        @csrf
                        <input type = "hidden" name = "id" value = "{{$atividades->id}}">
                        <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i> Alterar</button>
                    </form>
                    
                    <form action='{{url("/atividades/excluir")}}' method="post">
                        @csrf
                        <input type = "hidden" name = "id" value = "{{$atividades->id}}">
                        <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fas fa-trash"></i> Excluir</button>
                    </form>
                    
                    <a href="{{ url('/atividades') }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-times"></i> Fechar</i></a>
                </div>

            </div>
        </div>
    </div>

</section>

@endsection