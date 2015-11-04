@extends('templates.admin')


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Voluntarios</h1>




        @if( Session::has('accion') )
            @include('partial.success')

        @endif

        <table class="table table-striped">
            <thead>
            <th>#</th>

            <th>Nombre y Apellidos</th>
            <th>Télefono</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Contactado</th>
            <th></th>

            </thead>
            <?php $contador = 1;  ?>
            <tbody>
            @foreach($voluntarios AS $voluntario)

                <tr>
                    <td>{{ $contador }}</td>

                    <td>{!! $voluntario->nombres." ".$voluntario->apellidos !!}</td>
                    <td>{!! $voluntario->telefono !!}</td>
                    <td>{!! $voluntario->email !!}</td>
                    <td>{!! $voluntario->tipo !!}</td>
                    <td>{!! $voluntario->contactado !!}</td>
                    <td>
                        <a href="#" class="btn btn-success">Contactar</a>
                    </td>

                </tr>
                <?php $contador++;  ?>
            @endforeach

            </tbody>
        </table>

    </div>

@stop




@section('scripts')

    managerui.marcarActive('voluntario');

@stop