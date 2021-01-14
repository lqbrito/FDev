@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Exclusão de equipamentos</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/equipamentos') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <form action='{{url("/equipamentos/excluindo")}}' method="post">
                    
                    @csrf

                    <input type = "hidden" name = "id" value = "{{$equipamentos->id}}">

                    <div class="row">
                        <div class="col-lg-12">
                            <dl class="row">
                                <dt class='col-sm-2 text-right'>id</dt>
                                <dd class='col-sm-10'>{{$tp->id}}</dd>
                                <dt class='col-sm-2 text-right'>id_cli</dt>
                                <dd class='col-sm-10'>{{$tp->id_cli}}</dd>
                                <dt class='col-sm-2 text-right'>id_</dt>
                                <dd class='col-sm-10'>{{$tp->id_}}</dd>
                                <dt class='col-sm-2 text-right'>codigo_interno</dt>
                                <dd class='col-sm-10'>{{$tp->codigo_interno}}</dd>
                                <dt class='col-sm-2 text-right'>nome_tecnico</dt>
                                <dd class='col-sm-10'>{{$tp->nome_tecnico}}</dd>
                                <dt class='col-sm-2 text-right'>nome_comercial</dt>
                                <dd class='col-sm-10'>{{$tp->nome_comercial}}</dd>
                                <dt class='col-sm-2 text-right'>foto</dt>
                                <dd class='col-sm-10'>{{$tp->foto}}</dd>
                                <dt class='col-sm-2 text-right'>modelo</dt>
                                <dd class='col-sm-10'>{{$tp->modelo}}</dd>
                                <dt class='col-sm-2 text-right'>ano_fabricacao</dt>
                                <dd class='col-sm-10'>{{$tp->ano_fabricacao}}</dd>
                                <dt class='col-sm-2 text-right'>nro_serie</dt>
                                <dd class='col-sm-10'>{{$tp->nro_serie}}</dd>
                                <dt class='col-sm-2 text-right'>nro_lote</dt>
                                <dd class='col-sm-10'>{{$tp->nro_lote}}</dd>
                                <dt class='col-sm-2 text-right'>id_tpequipamento</dt>
                                <dd class='col-sm-10'>{{$tp->id_tpequipamento}}</dd>
                                <dt class='col-sm-2 text-right'>id_fabricante</dt>
                                <dd class='col-sm-10'>{{$tp->id_fabricante}}</dd>
                                <dt class='col-sm-2 text-right'>id_tpaquisicao</dt>
                                <dd class='col-sm-10'>{{$tp->id_tpaquisicao}}</dd>
                                <dt class='col-sm-2 text-right'>id_fornecedor</dt>
                                <dd class='col-sm-10'>{{$tp->id_fornecedor}}</dd>
                                <dt class='col-sm-2 text-right'>id_tpuso</dt>
                                <dd class='col-sm-10'>{{$tp->id_tpuso}}</dd>
                                <dt class='col-sm-2 text-right'>id_tpestado</dt>
                                <dd class='col-sm-10'>{{$tp->id_tpestado}}</dd>
                                <dt class='col-sm-2 text-right'>data_hora_estado_atual</dt>
                                <dd class='col-sm-10'>{{$tp->data_hora_estado_atual}}</dd>
                                <dt class='col-sm-2 text-right'>id_departamento</dt>
                                <dd class='col-sm-10'>{{$tp->id_departamento}}</dd>
                                <dt class='col-sm-2 text-right'>periodicidade_manutencoes</dt>
                                <dd class='col-sm-10'>{{$tp->periodicidade_manutencoes}}</dd>
                                <dt class='col-sm-2 text-right'>condicao</dt>
                                <dd class='col-sm-10'>{{$tp->condicao}}</dd>
                                <dt class='col-sm-2 text-right'>temperatura_media</dt>
                                <dd class='col-sm-10'>{{$tp->temperatura_media}}</dd>
                                <dt class='col-sm-2 text-right'>temperatura_minima</dt>
                                <dd class='col-sm-10'>{{$tp->temperatura_minima}}</dd>
                                <dt class='col-sm-2 text-right'>temperatura_maxima</dt>
                                <dd class='col-sm-10'>{{$tp->temperatura_maxima}}</dd>
                                <dt class='col-sm-2 text-right'>umidade_media</dt>
                                <dd class='col-sm-10'>{{$tp->umidade_media}}</dd>
                                <dt class='col-sm-2 text-right'>umidade_minima</dt>
                                <dd class='col-sm-10'>{{$tp->umidade_minima}}</dd>
                                <dt class='col-sm-2 text-right'>umidade_maxima</dt>
                                <dd class='col-sm-10'>{{$tp->umidade_maxima}}</dd>
                                <dt class='col-sm-2 text-right'>preco</dt>
                                <dd class='col-sm-10'>{{$tp->preco}}</dd>
                                <dt class='col-sm-2 text-right'>observacoes</dt>
                                <dd class='col-sm-10'>{{$tp->observacoes}}</dd>
                                <dt class='col-sm-2 text-right'>created_at</dt>
                                <dd class='col-sm-10'>{{$tp->created_at}}</dd>
                                <dt class='col-sm-2 text-right'>updated_at</dt>
                                <dd class='col-sm-10'>{{$tp->updated_at}}</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
                            <a href="{{ url('/equipamentos') }}" class="btn btn-default" title="Fechar'"><i class="fas fa-undo"></i> Cancelar</i></a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

</section>

@endsection