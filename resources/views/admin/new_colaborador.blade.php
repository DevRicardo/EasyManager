@extends('templates.admin')


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Nuevo Colaborador</h1>


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

                        {!! Form::open(['route'=>['admin.colaborador.store'],'method'=>'POST','class' => 'form', 'enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            <label>Logo o imagen del colaborador</label>
                            {!! Form::input('file', 'imagen', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            {!! Form::input('text', 'nombre', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Página web</label>
                            {!! Form::input('url', 'web', '', ['class'=> 'form-control']) !!}
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