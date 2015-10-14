<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Dashboard EasyManager</title>

    <!-- Bootstrap core CSS -->

    {!! Html::style('asset/css/bootstrap.min.css') !!}

    <!-- Custom styles for this template -->
    {!! Html::style('asset/css/dashboard.css') !!}




    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar navbar-fixed-top" >
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"  data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#">{!! Html::image('asset/img/logo.png','Imagen no encontrada',array('width' => '95px'))!!}</a>
        </div>

            <ul class="nav navbar-left navbar-brand" style="margin-left: 20px; color: #FF00BF;">
                <li>EeasyManager(Fundacion no Calles)</li>

            </ul>


    </div>

</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active" > </li>
                <li id="organizacion"><a href="/admin/organizacion/1"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Datos de la organización</a></li>

            </ul>
            <hr>
            <ul class="nav nav-sidebar">

                <li id="programa"><a href="/admin/programa"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Programas</a></li>
                <li id="colaborador" ><a href="/admin/colaborador"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Coalboradores</a></li>
                <li id="noticia"><a href="/admin/noticia"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Noticias</a></li>


            </ul>
            <hr>
            <ul class="nav nav-sidebar">
                <li><a href="/logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Cerrar sesión</a></li>

            </ul>
        </div>
        @yield('content')
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{!! Html::script('asset/js/jquery.min.js') !!}
{!! Html::script('asset/js/bootstrap.min.js') !!}
{!! Html::script('asset/js/manejoUi.js') !!}
{!! Html::script('asset/ckeditor/ckeditor.js') !!}


<script type="text/javascript">

    var managerui = new ManagerUi();
    @yield('scripts')
</script>



</body>
</html>
