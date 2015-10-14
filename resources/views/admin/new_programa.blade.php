@extends('templates.admin')


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Nuevo Programa</h1>


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

                     {!! Form::open(['route'=>['admin.programa.store'],'method'=>'POST','class' => 'form']) !!}
                        <div class="form-group">
                            <label>Nombres programa</label>
                            {!! Form::input('text', 'nombre_programa', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            {!! Form::textarea('descripcion_programa', '', ['id'=> 'descripcion_programa', 'class'=> 'form-control']) !!}
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
    CKEDITOR.replace( 'descripcion_programa' );
    managerui.marcarActive('programa');
@endsection