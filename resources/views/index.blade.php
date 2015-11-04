@extends("templates.pg")

@section("contenido")


    <div id="slider_p">
        <div id="imagen_p"></div>
        <div id="container">
            <div class="mensaje">

                {!! Html::image('asset/img/c1.png','Imagen no encontrada',array('style'=>'float: left; margin: 0px 5px 0px 0px'))!!}
                {!! $parametros['portada']->mensaje !!}
                {!! Html::image('asset/img/c2.png','Imagen no encontrada',array('style'=>'float: right; margin: 0px 0px 0px 5px'))!!}

            </div>
            <!--div class="barra"> </div-->
        </div>
    </div>

    <aside>
        <div id="link">
            <div class="txt_dona" style="text-align: justify;">
                <p>Nuestra Fundación es una entidad sin animo de lucro con un objetivo social tan importante
                    como lo es nuestra niñez y adolescencia.
                </p>
                <p>&nbsp;</p>
                <p>Recuerda que tu donación es muy importante, con ella ayudas a cambiar la vida de un niño
                    o niña victimas de abusos sexuales.
                </p>
            </div>
            <div id="ayuda">
                <div class="ayudar donar js-open-modal" data-modal-id="p-donar"></div>
                <div class="ayudar voluntario js-open-modal" data-modal-id="p-ayudar"></div>
            </div>
        </div>
    </aside>

    <div id="p-donar" class="modal-box">
        <!--a href="#" class="js-modal-close close">x</a-->
        <div class="t-donar">Dejanos tus datos y te contactaremos para tu donación!</div>
        <div class="cont-popup">
            <form title="form1" class="f-donar">
                <label title="Nombre">Nombre:</label>
                <input type="text" required="">
                <label title="Apellido">Apellido:</label>
                <input type="text" required="">
                <label title="Documento">Número de Documento:</label>
                <input type="number">
                <label title="Direccion">Dirección de Contacto:</label>
                <input type="text">
                <label title="Telefono">Numero de Telefono:</label>
                <input type="text">
                <input type="submit" title="Enviar">
                <div class="js-modal-close">Cerrar</div>
            </form>
        </div>
    </div>

    <div id="p-ayudar" class="modal-box">
        <!--a href="#" class="js-modal-close close">x</a-->
        <div class="t-donar">Dejanos tus datos y te contactaremos para que seas Voluntario</div>
        <div class="cont-popup">
            <form title="form1" class="f-donar">
                <label title="Nombre">Nombre:</label>
                <input type="text" required="">
                <label title="Apellido">Apellido:</label>
                <input type="text" required="">
                <label title="Documento">Número de Documento:</label>
                <input type="number">
                <label title="Direccion">Dirección de Contacto:</label>
                <input type="text">
                <label title="Telefono">Numero de Telefono:</label>
                <input type="text">
                <input type="submit" title="Enviar">
                <div class="js-modal-close">Cerrar</div>
            </form>
        </div>
    </div>


    <div id="patrocinadores">

        <ul id="item_co">
            @foreach($parametros['colaboradores'] AS $patrocinador)
                <li> <a href=""> {!! Html::image('asset/img/colaboradores/'.$patrocinador->imagen,'Imagen no encontrada',array("height"=>"100px"))!!}</a> </li>
            @endforeach
        </ul>

    </div>


@endsection




@section("scripts")

    $(function () {

    $("#slider_p").css("background","url('asset/img/portadas/{!! $parametros['portada']->imagen !!}') no-repeat top center");

    var appendthis = ("<div class='modal-overlay js-modal-close'></div>");
    $('div[data-modal-id]').click(function (e) {
    e.preventDefault();
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(500, 0.4);
    //$(".js-modalbox").fadeIn(500);
    var modalBox = $(this).attr('data-modal-id');
    $('#' + modalBox).fadeIn($(this).data());
    });


    $(".js-modal-close, .modal-overlay").click(function () {
    $(".modal-box, .modal-overlay").fadeOut(500, function () {
    $(".modal-overlay").remove();
    });
    });

    $(window).resize(function () {
    $(".modal-box").css({
    top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
    left: ($(window).width() - $(".modal-box").outerWidth()) / 2
    });
    });

    $(window).resize();

    });

@endsection