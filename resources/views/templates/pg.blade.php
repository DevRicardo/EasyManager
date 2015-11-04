<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>.:Fundación No Calles:.</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! Html::style('asset/css/pg/reset.css') !!}
    {!! Html::style('asset/css/pg/style.css') !!}
    {!! Html::style('asset/css/pg/menu.css') !!}

</head>
<body>
<div id="header">
    <header>
        <div id="logo">{!! Html::image('asset/img/logo.png','Imagen no encontrada',array())!!}</div>
        <div id="navigation">
            <ul id="menu" class="c-menu">
                <li class="list">
                    <a href="index.html">
                        <div class="opciones">
                            <div class="opc">INICIO</div>
                            <div class="opc-sub">Principal.</div>
                        </div>
                    </a>
                </li>
                <li class="list">
                    <a href="pg/conozcanos.html">
                        <div class="opciones">
                            <div class="opc">CONOZCANOS</div>
                            <div class="opc-sub">Quienes somos.</div>
                        </div>
                    </a>
                </li>
                <li class="list">
                    <a href="pg/labor.html">
                        <div class="opciones">
                            <div class="opc">NUESTRA LABOR</div>
                            <div class="opc-sub">Proyectos en marcha.</div>
                        </div>
                    </a>
                </li>
                <li class="list">
                    <a href="pg/noticias.html">
                        <div class="opciones">
                            <div class="opc">NOTICIAS</div>
                            <div class="opc-sub">Lo más destacado.</div>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
    </header>
</div>

@yield("contenido")

<footer>
    <div class="footer">
        <div class="contacto">
            <div class="t_cont">Fundación No Calles | CONTACTO:</div>
            <p>{!! $parametros['organizacion']->direccion !!}</p>
            <p>{!! $parametros['organizacion']->email !!}</p>
            <p>Lineas de Atención: {!! $parametros['organizacion']->fijo." - ".$parametros['organizacion']->celular !!}
            </p>
        </div>
        <div class="contacto redes">
            <div class="box-redes">
                <a href="#"><div class="fb"></div></a>
                <a href="#"><div class="tw"></div></a>
                <a href="#"><div class="inst"></div></a>
            </div>
            <div class="director">Director: Jhon Fredy Garcia Duque</div>
            <p style="font-size: 14px; color: #ccc"> ©  {!! date('Y') !!} - Todos los Derechos Reservados</p>
        </div>
    </div>
</footer>
{!! Html::script('asset/js/modernizr.custom.86080.js') !!}
{!! Html::script('asset/js/jquery.min.js') !!}

<script>
    @yield("scripts")
</script>

</body>
</html>
