@extends('templates.admin')


@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Datos Organización</h1>


        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        @if( Session::has('accion') )
                            @include('partial.success')

                        @endif
                    </div>

                    <div class="panel-body">
                        @include('partial.errors_form')
                        {!! Form::open(['route' => array('admin.organizacion.update', $organizacion->id),'method'=>'PUT', 'class' => 'form']) !!}

                        <div class="form-group">
                            <label>Nombre</label>
                            {!! Form::input('text', 'nombre', $organizacion->nombre, ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            {!! Form::input('text', 'direccion', $organizacion->direccion, ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Fijo</label>
                            {!! Form::input('text','fijo',$organizacion->fijo, ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Celular</label>
                            {!! Form::input('text','celular',$organizacion->celular, ['class'=> 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            {!! Form::email('email',$organizacion->email, ['class'=> 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label>Web</label>
                            {!! Form::input('text','web',$organizacion->web, ['class'=> 'form-control']) !!}
                        </div>

                        <hr>

                        <div class="form-group">
                            <label>Misión</label>
                            {!! Form::textarea('mision',$organizacion->mision, ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Visión</label>
                            {!! Form::textarea('vision',$organizacion->vision, ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Principios</label>
                            {!! Form::textarea('principios',$organizacion->principios, ['class'=> 'form-control']) !!}
                        </div>

                        <div>
                            {!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection


@section('scripts')

    CKEDITOR.replace( 'mision' );
    CKEDITOR.replace( 'vision' );
    CKEDITOR.replace( 'principios' );


    managerui.marcarActive('organizacion');

@endsection





<!--

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Dashboard</h1>


    <h2 class="sub-header">Section title</h2>
    <div class="table-responsive">

    </div>
</div>

-->




