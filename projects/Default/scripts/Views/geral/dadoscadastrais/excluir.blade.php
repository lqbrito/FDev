@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Exclusão de dadoscadastrais</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/dadoscadastrais') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <form action='{{url("/dadoscadastrais/excluindo")}}' method="post">
                    
                    @csrf

                    <input type = "hidden" name = "id" value = "{{$dadoscadastrais->id}}">

                    <div class="row">
                        <div class="col-lg-12">
                            <dl class="row">
                                <dt class='col-sm-2 text-right'>id</dt>
                                <dd class='col-sm-10'>{{$dadoscadastrais->id}}</dd>
                                <dt class='col-sm-2 text-right'>endereco</dt>
                                <dd class='col-sm-10'>{{$dadoscadastrais->endereco}}</dd>
                                <dt class='col-sm-2 text-right'>numero</dt>
                                <dd class='col-sm-10'>{{$dadoscadastrais->numero}}</dd>
                                <dt class='col-sm-2 text-right'>quadra</dt>
                                <dd class='col-sm-10'>{{$dadoscadastrais->quadra}}</dd>
                                <dt class='col-sm-2 text-right'>lote</dt>
                                <dd class='col-sm-10'>{{$dadoscadastrais->lote}}</dd>
                                <dt class='col-sm-2 text-right'>complemento</dt>
                                <dd class='col-sm-10'>{{$dadoscadastrais->complemento}}</dd>
                                <dt class='col-sm-2 text-right'>bairro</dt>
                                <dd class='col-sm-10'>{{$dadoscadastrais->bairro}}</dd>
                                <dt class='col-sm-2 text-right'>cep</dt>
                                <dd class='col-sm-10'>{{$dadoscadastrais->cep}}</dd>
                                <dt class='col-sm-2 text-right'>idcidade</dt>
                                <dd class='col-sm-10'>{{$dadoscadastrais->idcidade}}</dd>
                                <dt class='col-sm-2 text-right'>avatar</dt>
                                <dd class='col-sm-10'>{{$dadoscadastrais->avatar}}</dd>
                                <dt class='col-sm-2 text-right'>created_at</dt>
                                <dd class='col-sm-10'>{{$dadoscadastrais->created_at}}</dd>
                                <dt class='col-sm-2 text-right'>updated_at</dt>
                                <dd class='col-sm-10'>{{$dadoscadastrais->updated_at}}</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
                            <a href="{{ url('/dadoscadastrais') }}" class="btn btn-default" title="Fechar"><i class="fas fa-undo"></i> Cancelar</i></a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

</section>

@endsection