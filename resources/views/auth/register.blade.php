@extends('templates.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">

                    <div class="panel-heading">Registro</div>

                    <div class="panel-body">
                        @include('partial.errors_form')
                        {!! Form::open(['route' => 'usuario.store','method'=>'POST', 'class' => 'form']) !!}

                        <div class="form-group">
                            <label>Nombres</label>
                            {!! Form::input('text', 'nombres', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Apellidos</label>
                            {!! Form::input('text', 'apellidos', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            {!! Form::email('email', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Clave</label>
                            {!! Form::password('clave', ['class'=> 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label>Confirmar calve</label>
                            {!! Form::password('password_confirmation', ['class'=> 'form-control']) !!}
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