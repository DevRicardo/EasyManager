@extends('templates.admin')


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Portada</h1>


        @if($cantidad == 0)
        <a href="/admin/portada/create" class="btn btn-success">Nuevo portada</a>
        @endif

        @if( Session::has('accion') )
            @include('partial.success')

        @endif

        <table class="table table-striped">
            <thead>
            <th>#</th>

            <th>imagen</th>
            <th>Mensaje</th>
            <th>Opciones</th>

            </thead>
            <?php $contador = 1;  ?>
            <tbody>
            @foreach($portadas AS $portada)

                <tr>
                    <td>{{ $contador }}</td>

                    <td>{!! Html::image('asset/img/portadas/'.$portada->imagen,'Imagen no encontrada',array('width' => '80px'))!!}</td>
                    <td>{!! $portada->mensaje !!}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Opciones
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                <li>
                                    {!! Form::open(['method' => 'GET', 'route' => ['admin.portada.edit', $portada->id ]]) !!}
                                    {!! Form::submit('Editar', ['class' => 'btn btn-success','style'=>'width: 100%;']) !!}
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

    managerui.marcarActive('programa');

@stop