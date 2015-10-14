@extends('templates.admin')


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Noticias</h1>


        <a href="/admin/noticia/create" class="btn btn-success">Nueva Noticia</a>
        @if( Session::has('accion') )
            @include('partial.success')

        @endif
        <table class="table table-striped">
            <thead>
            <th>#</th>
            <th>Imagen</th>
            <th>Titulo</th>
            <th>Fecha</th>
            <th>Opciones</th>

            </thead>
            <?php $contador = 1;  ?>
            <tbody>
            @foreach($noticias AS $noticia)

                <tr>
                    <td>{{ $contador }}</td>
                    <td>{!! Html::image('asset/img/noticias/'.$noticia->imagen,'Imagen no encontrada',array('width' => '80px'))!!}</td>
                    <td>{{ $noticia->titulo }}</td>
                    <td>{{ $noticia->created_at }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Opciones
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                <li>
                                    {!! Form::open(['method' => 'GET', 'route' => ['admin.noticia.edit', $noticia->id ]]) !!}
                                    {!! Form::submit('Editar', ['class' => 'btn btn-success','style'=>'width: 100%;']) !!}
                                    {!! Form::close() !!}
                                </li>
                                <li>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.noticia.destroy', $noticia->id ]]) !!}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger', 'style'=>'width: 100%;']) !!}
                                    {!! Form::close() !!}
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php $contador++;  ?>
            @endforeach
            </tbody>
        </table>

    </div>

@stop




@section('scripts')

    managerui.marcarActive('noticia');

@stop
