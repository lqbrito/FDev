@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Consulta de inventario</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/inventario') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
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
                            <dt class='col-sm-2 text-right'>id_equipamento</dt>
                            <dd class='col-sm-10'>{{$tp->id_equipamento}}</dd>
                            <dt class='col-sm-2 text-right'>id_</dt>
                            <dd class='col-sm-10'>{{$tp->id_}}</dd>
                            <dt class='col-sm-2 text-right'>data_inicio</dt>
                            <dd class='col-sm-10'>{{$tp->data_inicio}}</dd>
                            <dt class='col-sm-2 text-right'>hora_inicio</dt>
                            <dd class='col-sm-10'>{{$tp->hora_inicio}}</dd>
                            <dt class='col-sm-2 text-right'>data_fim</dt>
                            <dd class='col-sm-10'>{{$tp->data_fim}}</dd>
                            <dt class='col-sm-2 text-right'>hora_fim</dt>
                            <dd class='col-sm-10'>{{$tp->hora_fim}}</dd>
                            <dt class='col-sm-2 text-right'>id_usuario_responsavel</dt>
                            <dd class='col-sm-10'>{{$tp->id_usuario_responsavel}}</dd>
                            <dt class='col-sm-2 text-right'>id_lancamento</dt>
                            <dd class='col-sm-10'>{{$tp->id_lancamento}}</dd>
                            <dt class='col-sm-2 text-right'>id_departamento</dt>
                            <dd class='col-sm-10'>{{$tp->id_departamento}}</dd>
                            <dt class='col-sm-2 text-right'>id_tpestado</dt>
                            <dd class='col-sm-10'>{{$tp->id_tpestado}}</dd>
                            <dt class='col-sm-2 text-right'>concluida</dt>
                            <dd class='col-sm-10'>{{$tp->concluida}}</dd>
                            <dt class='col-sm-2 text-right'>custo_materiais</dt>
                            <dd class='col-sm-10'>{{$tp->custo_materiais}}</dd>
                            <dt class='col-sm-2 text-right'>custo_servicos</dt>
                            <dd class='col-sm-10'>{{$tp->custo_servicos}}</dd>
                            <dt class='col-sm-2 text-right'>id_agente_servico_interno</dt>
                            <dd class='col-sm-10'>{{$tp->id_agente_servico_interno}}</dd>
                            <dt class='col-sm-2 text-right'>id_agente_servico_externo</dt>
                            <dd class='col-sm-10'>{{$tp->id_agente_servico_externo}}</dd>
                            <dt class='col-sm-2 text-right'>observacoes</dt>
                            <dd class='col-sm-10'>{{$tp->observacoes}}</dd>
                            <dt class='col-sm-2 text-right'>created_at</dt>
                            <dd class='col-sm-10'>{{$tp->created_at}}</dd>
                            <dt class='col-sm-2 text-right'>updated_at</dt>
                            <dd class='col-sm-10'>{{$tp->updated_at}}</dd>
                        </dl>
                    </div>
                </div>

                <div class="btn-group">
                    <form action='{{url("/inventario/alterar")}}' method="post">
                        @csrf
                        <input type = "hidden" name = "id" value = "{{$inventario->id}}">
                        <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i> Alterar</button>
                    </form>
                    
                    <form action='{{url("/inventario/excluir")}}' method="post">
                        @csrf
                        <input type = "hidden" name = "id" value = "{{$inventario->id}}">
                        <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fas fa-trash"></i> Excluir</button>
                    </form>
                    
                    <a href="{{ url('/inventario') }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-times"></i> Fechar</i></a>
                </div>

            </div>
        </div>
    </div>

</section>

@endsection