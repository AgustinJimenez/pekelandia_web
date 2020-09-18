@extends('layouts.master')

@section('title')
    Artículos | @parent
@stop

@section('meta')

<meta http-equiv="Content-Type" charset="UTF-8">
<meta name="language" content="es" />
<title>Pekelandia - Artículos</title>
<meta name="description" content="Pekelandia - Guia Infantil para padres - Artículos y Novedades">
<meta name="keywords" content="pekelandia,artículos,novedades,padres,familia,niños,blog,lectura,narraciones,infantiles,educativas,belleza,fiestas infantiles,educación,juguetería,maternidad,padres,pekeocio,ocio,promociones">
<meta name="robots" content="index,follow">

@stop

@section('style')

@stop

@section('content')


    <!--start section-->
    <section class="nicdark_section margin-top">

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">


            <div class="nicdark_space20"></div>


            <div class="grid grid_12">
                <h1 class="subtitle greydark rojizo-0">ARTÍCULOS</h1>
                <div class="nicdark_space20"></div>
                <!--<h3 class="subtitle grey">CHECK OUT OUR BEST EVENTS</h3>
                <div class="nicdark_space20"></div>
                <div class="nicdark_divider left big"><span class="nicdark_bg_orange nicdark_radius"></span></div>
                <div class="nicdark_space10"></div>-->
            </div>
        
        <div class="grid grid_9">
        @foreach ($articulos as $articulo)
            @if ($articulo->mostrar == true)
            

            <div class="nicdark_archive1 nicdark_bg_red nicdark_radius nicdark_shadow">

                <div class="nicdark_textevidence nicdark_width_percentage40 nicdark_width100_responsive">
                    <img alt=""  class="nicdark_radius_left nicdark_opacity" src="{{$articulo->imagen}}" style="height: 230px;">
                </div>
                
                <div class="nicdark_textevidence nicdark_width_percentage50 nicdark_width100_responsive">
                    <div class="nicdark_margin20">
                    
                        <h4 class="white"><a class="white" href="{{ (url('singlepost')).'/?articulo_id='.$articulo->id}}">{{$articulo->titulo}}</a></h4>                        
                        <div class="nicdark_space10"></div>
                        <p class="white">{{$articulo->created_at->format('d-m-Y')}}</p>
                        <div class="nicdark_space10"></div>
                        <p class="white">
                            {{ str_limit(strip_tags($articulo->contenido), 180) }}
                        </p>
                        <div class="nicdark_space20"></div>
                        <a href="{{ (url('singlepost')).'/?articulo_id='.$articulo->id}}" class="white nicdark_btn nicdark_bg_reddark small nicdark_radius nicdark_shadow nicdark_press">Leer Más</a>

                    </div>
                </div>

            </div>
            <div class="nicdark_space20"></div>
            
            @endif
        @endforeach

        </div>

            <div class="grid grid_3" style="float: right;">


                <!--archive1-->
                <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow" style="max-height: 480px; height: 480px">

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
                <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow" style="max-height: 480px; height: 480px">

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
        {!! $articulos->render() !!}
    </div>

    </section>
    <!--end section-->
    <!--end-->


@section('scripts')

@stop


@stop
