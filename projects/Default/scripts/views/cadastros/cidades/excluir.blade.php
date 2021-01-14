@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Exclusão de cidades</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/cidades') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <form action='{{url("/cidades/excluindo")}}' method="post">
                    
                    @csrf

                    <input type = "hidden" name = "id" value = "{{$cidades->id}}">

                    <div class="row">
                        <div class="col-lg-12">
                            <dl class="row">
                                <dt class='col-sm-2 text-right'>id</dt>
                                <dd class='col-sm-10'>{{$tp->id}}</dd>
                                <dt class='col-sm-2 text-right'>nome</dt>
                                <dd class='col-sm-10'>{{$tp->nome}}</dd>
                                <dt class='col-sm-2 text-right'>uf</dt>
                                <dd class='col-sm-10'>{{$tp->uf}}</dd>
                                <dt class='col-sm-2 text-right'>codigoibge</dt>
                                <dd class='col-sm-10'>{{$tp->codigoibge}}</dd>
                                <dt class='col-sm-2 text-right'>ddd</dt>
                                <dd class='col-sm-10'>{{$tp->ddd}}</dd>
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
                            <a href="{{ url('/cidades') }}" class="btn btn-default" title="Fechar'"><i class="fas fa-undo"></i> Cancelar</i></a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

</section>

@endsection