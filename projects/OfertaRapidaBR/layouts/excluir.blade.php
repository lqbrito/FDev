@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Exclusão de [nome_model]</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/[nome_controller]') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <form action='{{url("/[nome_controller]/excluindo")}}' method="post">
                    
                    @csrf

                    <input type = "hidden" name = "id" value = "{{$[nome_model]->id}}">

                    <div class="row">
                        <div class="col-lg-12">
                            <dl class="row">
                                [nome_campo]
                            </dl>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
                            <a href="{{ url('/[nome_controller]') }}" class="btn btn-default" title="Fechar"><i class="fas fa-undo"></i> Cancelar</i></a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

</section>

@endsection