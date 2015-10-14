@extends('templates.admin')


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Nueva Noticia</h1>


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

                        {!! Form::open(['route'=>['admin.noticia.store'],'method'=>'POST','class' => 'form', 'enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            <label>Imagen de la noticia</label>
                            {!! Form::input('file', 'imagen', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Titulo</label>
                            {!! Form::input('text', 'titulo', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Contenido</label>
                            {!! Form::textarea('contenido', '', ['class'=> 'form-control']) !!}
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
    CKEDITOR.replace( 'contenido' );
    managerui.marcarActive('noticia');
@endsection