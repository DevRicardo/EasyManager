@extends('templates.admin')


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Nueva Portada</h1>


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

                        {!! Form::open(['route'=>['admin.portada.store'],'method'=>'POST','class' => 'form', 'enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            <label>Imagen de la portada <small>La imagen debe tener un tamaño de 1500 X 500px </small></label>
                            {!! Form::input('file', 'imagen', '', ['class'=> 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label>Mensaje</label>
                            {!! Form::textarea('mensaje', '', ['class'=> 'form-control']) !!}
                        </div>

                        <div>
                            {!! Form::submit('Publicar',['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>



    </div>

@endsection




@section('scripts')
    CKEDITOR.replace( 'mensaje' );
    managerui.marcarActive('portada');
@endsection