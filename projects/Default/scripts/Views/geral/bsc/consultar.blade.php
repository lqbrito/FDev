@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Consulta de bsc</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/bsc') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <dl class="row">
                            <dt class='col-sm-2 text-right'>id</dt>
                            <dd class='col-sm-10'>{{$bsc->id}}</dd>
                            <dt class='col-sm-2 text-right'>descricao</dt>
                            <dd class='col-sm-10'>{{$bsc->descricao}}</dd>
                            <dt class='col-sm-2 text-right'>idempresa</dt>
                            <dd class='col-sm-10'>{{$bsc->idempresa}}</dd>
                            <dt class='col-sm-2 text-right'>idgrupo</dt>
                            <dd class='col-sm-10'>{{$bsc->idgrupo}}</dd>
                            <dt class='col-sm-2 text-right'>idsubgrupo</dt>
                            <dd class='col-sm-10'>{{$bsc->idsubgrupo}}</dd>
                            <dt class='col-sm-2 text-right'>observacoes</dt>
                            <dd class='col-sm-10'>{{$bsc->observacoes}}</dd>
                            <dt class='col-sm-2 text-right'>created_at</dt>
                            <dd class='col-sm-10'>{{$bsc->created_at}}</dd>
                            <dt class='col-sm-2 text-right'>updated_at</dt>
                            <dd class='col-sm-10'>{{$bsc->updated_at}}</dd>
                        </dl>
                    </div>
                </div>

                <div class="btn-group">
                    <form action='{{url("/bsc/alterar")}}' method="post">
                        @csrf
                        <input type = "hidden" name = "id" value = "{{$bsc->id}}">
                        <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i> Alterar</button>
                    </form>
                    
                    <form action='{{url("/bsc/excluir")}}' method="post">
                        @csrf
                        <input type = "hidden" name = "id" value = "{{$bsc->id}}">
                        <button type="submit" class="btn btn-sm btn-primary mr-1"><i class="fas fa-trash"></i> Excluir</button>
                    </form>
                    
                    <a href="{{ url('/bsc') }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-times"></i> Fechar</i></a>
                </div>

            </div>
        </div>
    </div>

</section>

@endsection