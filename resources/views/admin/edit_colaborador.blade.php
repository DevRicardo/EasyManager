@extends('templates.admin')


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Editar Colaborador</h1>


        <div class="row">
            <div class="col-md-9col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading">

                        @if( Session::has('accion') )
                            @include('partial.success')

                        @endif
                    </div>

                    <div class="panel-body">
                        @include('partial.errors_form')

                        {!! Form::open(['route'=>['admin.colaborador.update', $colaborador->id],'method'=>'PUT','class' => 'form', 'enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2">
                                    {!! Html::image('asset/img/colaboradores/'.$colaborador->imagen,'Imagen no encontrada',array('width' => '80px'))!!}

                                </div>
                                <div class="col-lg-10">
                                    <label>Logo o imagen del colaborador</label>
                                    {!! Form::input('file', 'imagen', '', ['class'=> 'form-control']) !!}
                                </div>
                            </div>


                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            {!! Form::input('text', 'nombre', $colaborador->nombre, ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Página web</label>
                            {!! Form::input('url', 'web', $colaborador->web, ['class'=> 'form-control']) !!}
                        </div>

                        <div>
                            {!! Form::submit('Aplicar',['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>



    </div>

@endsection




@section('scripts')

    managerui.marcarActive('colaborador');
@endsection