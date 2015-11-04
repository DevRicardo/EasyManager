@extends('templates.admin')


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Editar Portada</h1>


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

                        {!! Form::open(['route'=>['admin.portada.update', $portada->id],'method'=>'PUT','class' => 'form', 'enctype'=>'multipart/form-data']) !!}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2">
                                    {!! Html::image('asset/img/portadas/'.$portada->imagen,'Imagen no encontrada',array('width' => '80px'))!!}

                                </div>
                                <div class="col-lg-10">
                                    <label>Imagen de la noticia</label>
                                    {!! Form::input('file', 'imagen', '', ['class'=> 'form-control']) !!}
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <label>Mensaje</label>
                            {!! Form::textarea('mensaje', $portada->mensaje, ['class'=> 'form-control']) !!}
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