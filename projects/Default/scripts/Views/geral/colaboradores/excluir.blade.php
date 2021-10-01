@extends('layouts.lteapp')

@section('content')

<section class="content">

    <div class="col-lg-12">
        <div class="card card-warning card-outline">

            <div class="card-header">
                <h5 class="card-title m-0">Exclusão de colaboradores</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Minimizar/Restaurar"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Maximizar"><i class="fas fa-expand"></i></button>
                    <a href="{{ url('/colaboradores') }}" class="btn btn-tool btn-sm" title="Fechar'"><i class="fas fa-times"></i></a>
                </div>
            </div>

            <div class="card-body">

                <form action='{{url("/colaboradores/excluindo")}}' method="post">
                    
                    @csrf

                    <input type = "hidden" name = "id" value = "{{$colaboradores->id}}">

                    <div class="row">
                        <div class="col-lg-12">
                            <dl class="row">
                                <dt class='col-sm-2 text-right'>id</dt>
                                <dd class='col-sm-10'>{{$colaboradores->id}}</dd>
                                <dt class='col-sm-2 text-right'>idusuario</dt>
                                <dd class='col-sm-10'>{{$colaboradores->idusuario}}</dd>
                                <dt class='col-sm-2 text-right'>idestruturaempresarial</dt>
                                <dd class='col-sm-10'>{{$colaboradores->idestruturaempresarial}}</dd>
                                <dt class='col-sm-2 text-right'>name</dt>
                                <dd class='col-sm-10'>{{$colaboradores->name}}</dd>
                                <dt class='col-sm-2 text-right'>rg</dt>
                                <dd class='col-sm-10'>{{$colaboradores->rg}}</dd>
                                <dt class='col-sm-2 text-right'>orgaoexpedidor</dt>
                                <dd class='col-sm-10'>{{$colaboradores->orgaoexpedidor}}</dd>
                                <dt class='col-sm-2 text-right'>datanascimento</dt>
                                <dd class='col-sm-10'>{{$colaboradores->datanascimento}}</dd>
                                <dt class='col-sm-2 text-right'>sexo</dt>
                                <dd class='col-sm-10'>{{$colaboradores->sexo}}</dd>
                                <dt class='col-sm-2 text-right'>idcadastro</dt>
                                <dd class='col-sm-10'>{{$colaboradores->idcadastro}}</dd>
                                <dt class='col-sm-2 text-right'>status</dt>
                                <dd class='col-sm-10'>{{$colaboradores->status}}</dd>
                                <dt class='col-sm-2 text-right'>nivelvisao</dt>
                                <dd class='col-sm-10'>{{$colaboradores->nivelvisao}}</dd>
                                <dt class='col-sm-2 text-right'>acoes</dt>
                                <dd class='col-sm-10'>{{$colaboradores->acoes}}</dd>
                                <dt class='col-sm-2 text-right'>created_at</dt>
                                <dd class='col-sm-10'>{{$colaboradores->created_at}}</dd>
                                <dt class='col-sm-2 text-right'>updated_at</dt>
                                <dd class='col-sm-10'>{{$colaboradores->updated_at}}</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
                            <a href="{{ url('/colaboradores') }}" class="btn btn-default" title="Fechar"><i class="fas fa-undo"></i> Cancelar</i></a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

</section>

@endsection