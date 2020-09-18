@extends('layouts.master')

@section('title')
    Promociones | @parent
@stop

@section('meta')

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="language" content="es" />
<title>Pekelandia - Promociones</title>
<meta name="description" content="Pekelandia - Guia Infantil para padres - Promociones, Ofertas y Sorteos">
<meta name="keywords" content="pekelandia promociones,pekelandia ofertas,pekelandia sorteos,promociones paraguay,ofertas paraguay,sorteos paraguay,descuentos,descuentos paraguay,paginas de ofertas,educación,belleza,fiestas infantiles,juguetería,maternidad,padres,pekeocio,ocio,promociones,guia, infantil, padres, anuncios, directorio, jugueterias, librerias, sanatorios,peluquerias,niños,deportes,salud,decoracion,ropa,accesorios,libros,cuentos,ajuar,blanqueria,natacion,pintura">
<meta name="robots" content="index,follow">
<meta name="author" content="http://zentcode.com">

@stop

@section('style')

<style type="text/css">
    .fa.fa-square {
        font-size: 24px;
    }
</style>

@stop

@section('content')


    <!--start section-->
    <section class="nicdark_section">

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">


            <div class="nicdark_space20"></div>

            <div class="grid grid_12 percentage">
                <div class="grid grid_3">
                    <h2 class="subtitle greydark text-center">Ofertas&nbsp;<i class="fa fa-square" style="color: #e0b84e"></i></h2>
                    <div class="nicdark_space10"></div>
                </div>
                <div class="grid grid_3">
                    <h2 class="subtitle greydark text-center">Descuentos&nbsp;<i class="fa fa-square" style="color: #6ab78a"></i></h2>
                    <div class="nicdark_space10"></div>
                </div>
                <div class="grid grid_3">
                    <h2 class="subtitle greydark text-center">Sorteos&nbsp;<i class="fa fa-square" style="color: #df764e"></i></h2>
                    <div class="nicdark_space10"></div>
                </div>
            </div>

            <div class="grid grid_9 percentage">

            @foreach ($promociones as $promocion)
        
            <div class="grid grid_3">

                @if ($promocion->mostrar == true & $promocion->tipo == 'Oferta')

                    <!--archive1-->
                    <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow center card-grid">
                        <div style="background:url(img/courses/img3.jpg); background-size:cover;" class="nicdark_archive1 nicdark_radius">
                            <div class="nicdark_filter yellow nicdark_radius_top">
                                <img alt=""  src="{{$promocion->imagen}}" style="height: 230px">
                            </div>
                        </div>
                        <div class="nicdark_textevidence nicdark_bg_yellowdark">
                            <h4 class="white nicdark_margin20">{{$promocion->titulo}}</h4>
                        </div>
                        <div class="nicdark_margin20">
                            <p>{{ str_limit(strip_tags($promocion->contenido), 120) }}</p>
                            <div class="nicdark_space20"></div>
                            <a href="{{ (url('singlepost')).'/?promocion_id='.$promocion->id}}" class="white nicdark_btn nicdark_bg_yellow medium nicdark_radius nicdark_shadow nicdark_press">Ver Más</a>
                        </div>
                    </div>
                    <!--archive1-->

                @elseif ($promocion->mostrar == true & $promocion->tipo == 'Descuento')

                    <!--archive1-->
                    <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow center card-grid">
                        <div style="background:url(img/courses/img3.jpg); background-size:cover;" class="nicdark_archive1 nicdark_radius">
                            <div class="nicdark_filter green nicdark_radius_top">
                                <img alt=""  src="{{$promocion->imagen}}" style="height: 230px">
                            </div>
                        </div>
                        <div class="nicdark_textevidence nicdark_bg_greendark">
                            <h4 class="white nicdark_margin20">{{$promocion->titulo}}</h4>
                        </div>
                        <div class="nicdark_margin20">
                            <p>{{ str_limit(strip_tags($promocion->contenido), 120) }}</p>
                            <div class="nicdark_space20"></div>
                            <a href="{{ (url('singlepost')).'/?promocion_id='.$promocion->id}}" class="white nicdark_btn nicdark_bg_green medium nicdark_radius nicdark_shadow nicdark_press">Ver Más</a>
                        </div>
                    </div>
                    <!--archive1-->

                @else

                    <!--archive1-->
                    <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow center card-grid">
                        <div style="background:url(img/courses/img3.jpg); background-size:cover;" class="nicdark_archive1 nicdark_radius">
                            <div class="nicdark_filter orange nicdark_radius_top">
                                <img alt=""  src="{{$promocion->imagen}}" style="height: 230px">
                            </div>
                        </div>
                        <div class="nicdark_textevidence nicdark_bg_orangedark">
                            <h4 class="white nicdark_margin20">{{$promocion->titulo}}</h4>
                        </div>
                        <div class="nicdark_margin20">
                            <p>{{ str_limit(strip_tags($promocion->contenido), 120) }}</p>
                            <div class="nicdark_space20"></div>
                            <a href="{{ (url('singlepost')).'/?promocion_id='.$promocion->id}}" class="white nicdark_btn nicdark_bg_orange medium nicdark_radius nicdark_shadow nicdark_press">Ver Más</a>
                        </div>
                    </div>
                    <!--archive1-->

                @endif

            </div>

            @endforeach

            </div>

            <div class="grid grid_3" style="float: right;">
                <!--archive1-->
                <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow card-grid">

                @foreach ($anuncios as $anuncio)
                    @if ($anuncio->orden == 1)
                    <div class="nicdark_margin10" style="height: 230px; width: 92%; margin-bottom: 0px;">
                        <a href="{{$anuncio->vinculo}}" target="_blank">
                            <img src="{{$anuncio->imagen}}" style="width:100%; height: 100%;border-radius: 5px 5px 5px 5px;">
                        </a>
                    </div>

                    @elseif ($anuncio->orden == 2)

                    <div class="nicdark_margin10" style="height: 230px; width: 92%; margin-top: 0px;">
                        <a href="{{$anuncio->vinculo}}" target="_blank">
                            <img src="{{$anuncio->imagen}}" style="width:100%; height: 100%;border-radius: 5px 5px 5px 5px;">
                        </a>
                    </div>

                </div>
                <!--archive1-->

                <div class="nicdark_space20"></div>

                <!--archive1-->
                <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow card-grid">

                    @elseif ($anuncio->orden == 3)

                    <div class="nicdark_margin10" style="height: 230px; width: 92%; margin-bottom: 0px;">
                        <a href="{{$anuncio->vinculo}}" target="_blank">
                            <img src="{{$anuncio->imagen}}" style="width:100%; height: 100%;border-radius: 5px 5px 5px 5px;">
                        </a>
                    </div>

                    @else

                    <div class="nicdark_margin10" style="height: 230px; width: 92%; margin-top: 0px;">
                        <a href="{{$anuncio->vinculo}}" target="_blank">
                            <img src="{{$anuncio->imagen}}" style="width:100%; height: 100%;border-radius: 5px 5px 5px 5px;">
                        </a>
                    </div>

                </div>
                <!--archive1-->
                    @endif

                @endforeach

            </div>


            <div class="nicdark_space20"></div>

       </div>
       <!--end nicdark_container-->

    <div class="text-center">
        {!! $promociones->render() !!}
    </div>

    </section>
    <!--end section-->
    <!--end-->


@section('scripts')

@stop


@stop
