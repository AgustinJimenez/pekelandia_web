@extends('layouts.master')

@section('title')
    Videos | @parent
@stop

@section('meta')

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="language" content="es" />
<title>Pekelandia - Videos</title>
<meta name="description" content="Pekelandia - Guia Infantil para padres - Galería de videos">
<meta name="keywords" content="pekelandia videos,videos,publicaciones,artículos,educación,belleza,fiestas infantiles,juguetería,maternidad,padres,pekeocio,ocio,promociones,guia, infantil, padres, anuncios, directorio, jugueterias, librerias, sanatorios,peluquerias,niños,deportes,salud,decoracion,ropa,accesorios,libros,cuentos,ajuar,blanqueria,natacion,pintura">
<meta name="robots" content="index,follow">
<meta name="author" content="http://zentcode.com">

@stop

@section('style')

<style type="text/css">
    .contenedor-video iframe,
    .contenedor-video object,
    .contenedor-video embed {
    margin: auto;
    position: relative;
    left: 0;
    padding: 10px;
    width: 100%;
    height: 315px;
    max-width: 560px;
    }
</style>
@stop

@section('content')


<!--start section-->
<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">


            <div class="nicdark_space20"></div>


            <div class="grid grid_12">
                <h1 class="subtitle greydark  rojizo-0">VIDEOS</h1>
                <div class="nicdark_space20"></div>
                <!--<h3 class="subtitle grey">CHECK OUT OUR BEST EVENTS</h3>
                <div class="nicdark_space20"></div>
                <div class="nicdark_divider left big"><span class="nicdark_bg_orange nicdark_radius"></span></div>
                <div class="nicdark_space10"></div>-->
            </div>


        <!--start nicdark_masonry_container-->
        <div class="nicdark_masonry_container">

        @foreach ($videos as $video)
        	@if ($video->mostrar == true)
			<div class="grid grid_6 nicdark_masonry_item">
			    <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
			        <div class="nicdark_textevidence nicdark_bg_blue nicdark_radius_top text-center">
			        	<!--<i class="icon-video nicdark_iconbg right medium blue"></i>-->
			            <h4 class="white nicdark_margin20">{{$video->titulo}}</h4>
			        </div>
			        <div id="contenedor-video" class="nicdark_margin20" style="height: 315px;">
			            {!! $video->codigoembed !!}
			        </div>
			    </div>
			</div>
			@endif
		@endforeach

		</div>
		<!--end nicdark_masonry_container-->

		<div class="nicdark_space20"></div>

	</div>
	<!--end nicdark_container-->

    <div class="text-center">
        {!! $videos->render() !!}
    </div>

</section>
<!--end section-->



@section('scripts')

@stop


@stop