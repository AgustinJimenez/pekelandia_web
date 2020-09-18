@extends('layouts.master')

@section('title')
    Revistas | @parent
@stop

@section('meta')

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="language" content="es" />
<title>Pekelandia - Revistas</title>
<meta name="description" content="Pekelandia - Guia Infantil para padres - Revistas y Publicaciones">
<meta name="keywords" content="pekelandia revistas,revistas,novedades,artículos,guia, infantil, padres, anuncios, directorio, jugueterias, librerias, sanatorios,peluquerias,niños,deportes,salud,decoracion,ropa,accesorios,libros,cuentos,ajuar,blanqueria,natacion,pintura,sociales,publicaciones">
<meta name="robots" content="index,follow">
<meta name="author" content="http://zentcode.com">

@stop

@section('style')

@stop

@section('content')


<!--start section-->
<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">

            <div class="nicdark_space20"></div>


            <div class="grid grid_12">
                <h1 class="subtitle greydark  rojizo-0">REVISTAS</h1>
                <div class="nicdark_space20"></div>
            </div>

    <div class="grid grid_2" style="float: right;">

    @foreach ($anuncios as $anuncio)
        @if ($anuncio->orden == 1)

        <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow" style="max-height: 350px; min-height: 350px; height: 350px;">
            <a href="{{$anuncio->vinculo}}" target="_blank">
                <img alt="" src="{{$anuncio->imagen}}" style="height: 100%;width: 100%;">
            </a>

        </div>

        <div class="nicdark_space20"></div>

        @else

        <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow" style="max-height: 350px; min-height: 350px; height: 350px;">

            <a href="{{$anuncio->vinculo}}" target="_blank">
                <img alt="" src="{{$anuncio->imagen}}" style="height: 100%;width: 100%;">
            </a>

        </div>

        @endif

    @endforeach

    </div>

    @foreach ($revistas as $revista)
        @if ($revista->mostrar == true)

        <div class="grid grid_2">

            <!-- start product-->
            <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow" style="max-height: 350px; min-height: 350px; height: 350px;">

                <a href="{{ (url('singlepost')).'/?revista_id='.$revista->id}}">

                <img alt="" src="{{$revista->imagen}}" style="max-height: 240px; min-height: 240px; height: 240px;"></a>

                <div class="nicdark_textevidence nicdark_bg_greydark">
                    <h5 class="white nicdark_margin10">{{$revista->titulo}}</h5>
                </div>

                <div class="nicdark_textevidence">
                    <div class="nicdark_margin10">
                        <p>Edición Nro. {{$revista->numero}}</p>
                        <p>Año {{$revista->year}}</p>
                    </div>
                </div>

            </div>
            <!-- end product-->
        </div>
        @endif
    @endforeach

        <div class="nicdark_space20"></div>

    </div>

    <div class="text-center">
        {!! $revistas->render() !!}
    </div>

</section>


@section('scripts')

@stop


@stop
