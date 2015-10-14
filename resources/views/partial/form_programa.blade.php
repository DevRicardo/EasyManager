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


                <div class="form-group">
                    <label>Nombres programa</label>
                    {!! Form::input('text', 'nombre_programa', $programa->nombre_programa, ['class'=> 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    {!! Form::textarea('descripcion_programa', $programa->descripcion_programa, ['id'=> 'descripcion_programa', 'class'=> 'form-control']) !!}
                </div>

                <div>
                    {!! Form::submit('Aplicar',['class' => 'btn btn-primary']) !!}
                </div>

            </div>
        </div>
    </div>
</div>