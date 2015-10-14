@extends('templates.admin')


@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Editar programa</h1>
        {!! Form::open(['route' => array('admin.programa.update', $programa->id),'method'=>'PUT', 'class' => 'form']) !!}
        @include('partial.form_programa')
        {!! Form::close() !!}
    </div>
@stop





@section('scripts')
    CKEDITOR.replace( 'descripcion_programa' );
    managerui.marcarActive('programa');
@stop