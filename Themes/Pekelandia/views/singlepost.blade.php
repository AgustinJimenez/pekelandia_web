@extends('layouts.master')

@section('title')
    Single Post @parent
@stop

@section('meta')

@if (isset($singlepost_revista))
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="language" content="es" />
    <title>{{$singlepost_revista->titulo}} N°: {{$singlepost_revista->numero}} Edición: {{$singlepost_revista->year}}</title>
    <meta name="description" content="{{$singlepost_revista->titulo}} N°: {{$singlepost_revista->numero}} Edición: {{$singlepost_revista->year}}">
    <meta name="keywords" content="{{$singlepost_revista->titulo}} N°: {{$singlepost_revista->numero}} Edición: {{$singlepost_revista->year}}">
    <meta name="author" content="http://zentcode.com">
@endif

@if (isset($singlepost_evento))
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="language" content="es" />
    <title>{{$singlepost_evento->titulo}}</title>
    <meta name="description" content="{{preg_replace("/&#?[a-z0-9]+;/i"," ",(str_limit(strip_tags($singlepost_evento->contenido), 150)))}}">
    <meta name="keywords" content="{{$singlepost_evento->tags}}">
    <meta name="author" content="http://zentcode.com">

    <!-- Open Graph data -->
    <meta property="og:url"           content="{{$url}}" />
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="{{$singlepost_evento->titulo}}" />
    <meta property="og:description"   content="{{preg_replace("/&#?[a-z0-9]+;/i"," ",(str_limit(strip_tags($singlepost_evento->contenido), 150)))}}" />
    <meta property="og:image"         content="{{$singlepost_evento->imagen}}" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{$url}}">
    <meta name="twitter:title" content="{{$singlepost_evento->titulo}}">
    <meta name="twitter:description" content="{{preg_replace("/&#?[a-z0-9]+;/i"," ",(str_limit(strip_tags($singlepost_evento->contenido), 150)))}}">
    <meta name="twitter:creator" content="Pekelandia">
    <meta name="twitter:image" content="{{$singlepost_evento->imagen}}">
@endif

@if (isset($singlepost_promocion))
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="language" content="es" />
    <title>{{$singlepost_promocion->titulo}}</title>
    <meta name="description" content="{{preg_replace("/&#?[a-z0-9]+;/i"," ",(str_limit(strip_tags($singlepost_promocion->contenido), 150)))}}">
    <meta name="keywords" content="{{$singlepost_promocion->tags}}">
    <meta name="author" content="http://zentcode.com">

    <!-- Open Graph data -->
    <meta property="og:url"           content="{{$url}}" />
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="{{$singlepost_promocion->titulo}}" />
    <meta property="og:description"   content="{{preg_replace("/&#?[a-z0-9]+;/i"," ",(str_limit(strip_tags($singlepost_promocion->contenido), 150)))}}" />
    <meta property="og:image"         content="{{$singlepost_promocion->imagen}}" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{$url}}">
    <meta name="twitter:title" content="{{$singlepost_promocion->titulo}}">
    <meta name="twitter:description" content="{{preg_replace("/&#?[a-z0-9]+;/i"," ",(str_limit(strip_tags($singlepost_promocion->contenido), 150)))}}">
    <meta name="twitter:creator" content="Pekelandia">
    <meta name="twitter:image" content="{{$singlepost_promocion->imagen}}">
@endif

@if (isset($singlepost_articulo))
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="language" content="es" />
    <title>{{$singlepost_articulo->titulo}}</title>
    <meta name="description" content="{{preg_replace("/&#?[a-z0-9]+;/i"," ",(str_limit(strip_tags($singlepost_articulo->contenido), 150)))}}">
    <meta name="keywords" content="{{$singlepost_articulo->tags}}">
    <meta name="author" content="http://zentcode.com">

    <meta property="og:url"           content="{!!$url!!}" />
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="{{$singlepost_articulo->titulo}}" />
    <meta property="og:description"   content="{{preg_replace("/&#?[a-z0-9]+;/i"," ",(str_limit(strip_tags($singlepost_articulo->contenido), 150)))}}" />
    <meta property="og:image"         content="{{$singlepost_articulo->imagen}}" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{$url}}">
    <meta name="twitter:title" content="{{$singlepost_articulo->titulo}}">
    <meta name="twitter:description" content="{{preg_replace("/&#?[a-z0-9]+;/i"," ",(str_limit(strip_tags($singlepost_articulo->contenido), 150)))}}">
    <meta name="twitter:creator" content="Pekelandia">
    <meta name="twitter:image" content="{{$singlepost_articulo->imagen}}">
@endif

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
    #articuloContenido, #promocionContenido, #eventoContenido {
        text-align: left;
        /*padding: 0px 5px 0px 5px !important;*/
    }
    .singleimage {
        float:left;
        margin: auto;
        /*width:40%;
        padding: 0 5px 0 5px;*/
    }
    .contenedor-revista .reader-container,
    .contenedor-revista .contenedor-revista .reader,
    .contenedor-revista .reader__layout {
        width: 100%;
        height: auto;
        margin: auto;
        position: relative;
        left: 0;
    }
    .issuuembed.issuu-isrendered {
        width: 100%!important;
    }
    #articuloContenido .img-cabecera, #promocionContenido .img-cabecera, #eventoContenido .img-cabecera {
        display: inline-block;
        width: 40% !important;
        height: auto !important;
        border-radius: 5px 5px 5px 5px !important;
        margin-right: 5px !important;
        padding-left: 0px !important;

    }

    #articuloContenido div img, #promocionContenido div img, #eventoContenido div img {
        max-width:100%;
        max-height:100%;
    }
    

    #articuloContenido .right, #promocionContenido .right, #eventoContenido .right {
        float: right;
    }
    #articuloContenido .left, #promocionContenido .left, #eventoContenido .left {
        float: left;
    }
    .grid.grid_9.share .margin-share
    {
        margin-bottom: 5px;
    }
</style>
@stop

@section('content')

    <!--start section-->
    <section class="nicdark_section">

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">

            <div class="grid grid_9">

            {{-- <button class="btn btn-default" onclick="shareFacebook()">Compartir FB</button> --}}
            {{-- <a class="btn btn-default" href="fb://facewebmodal/">Compartir FB</a> --}}

                <div class="nicdark_space20"></div>
                    <div class="text-center">
                @if (isset($singlepost_revista))

                    <div class="nicdark_space10"></div>

                    <div class="nicdark_space20"></div>
                    <h1 class="subtitle greydark  rojizo-0">{!! $singlepost_revista->titulo !!} N°: {!! $singlepost_revista->numero !!} Edición: {!! $singlepost_revista->year !!}</h1>
                    <div class="nicdark_space30"></div>

                    <div id="revistaContenido">

                        <div class="contenedor-revista"> 

                            {!! $singlepost_revista->codigoembed !!}
                        </div>

                    </div>

                @elseif (isset($singlepost_evento))

                    <div class="nicdark_space10"></div>

                    <div id="eventoContenido" class="contenido">

                        <div class="nicdark_space20"></div>
                        <h1 class="subtitle greydark  rojizo-0">{!! $singlepost_evento->titulo !!}</h1>
                        <div class="nicdark_space5"></div>
                        <p class="greydark">{{$singlepost_evento->created_at->format('d-m-Y')}}</p>
                        <div class="nicdark_space10"></div>
                        
                        <img alt="" class="singleimage nicdark_radius img-cabecera" src="{{$singlepost_evento->imagen}}">
                        
                        <div class="nicdark_space20"></div>
                        
                            {!! $singlepost_evento->contenido !!}

                    </div>

                    <div class="nicdark_space20"></div>

                    <div class="grid grid_9 share">
                        <div id="whatsapp" style="display: inline;"></div>
                        
                        <a href="{{$social['facebook']}}" class="btn btn-primary nicdark_shadow nicdark_radius margin-share"><i class="fa fa-facebook-official"></i>&nbsp;&nbsp;Compartir en Facebook</a>
                        <a href="{{$social['twitter']}}" class="btn btn-info nicdark_shadow nicdark_radius margin-share"><i class="icon-twitter-squared"></i>&nbsp;&nbsp;Compartir en Twitter&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        <a href="{{$social['email']}}" class="btn btn-warning nicdark_shadow nicdark_radius margin-share"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Enviar por Correo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div>

                @elseif (isset($singlepost_promocion))

                    <div class="nicdark_space10"></div>

                    <div id="promocionContenido" class="contenido">

                        <div class="nicdark_space20"></div>
                        <h1 class="subtitle greydark  rojizo-0">{!! $singlepost_promocion->titulo !!}</h1>
                        <div class="nicdark_space5"></div>
                        <p class="greydark">{{$singlepost_promocion->created_at->format('d-m-Y')}}</p>
                        <div class="nicdark_space10"></div>
                        
                        <img alt="" class="singleimage nicdark_radius img-cabecera" src="{{$singlepost_promocion->imagen}}">
                        
                        <div class="nicdark_space20"></div>
                    
                        {!! $singlepost_promocion->contenido !!}

                    </div>

                    <div class="nicdark_space20"></div>

                    <div class="grid grid_9 share">
                        <div id="whatsapp" style="display: inline;"></div>
                        
                        <a href="{{$social['facebook']}}" class="btn btn-primary nicdark_shadow nicdark_radius margin-share"><i class="fa fa-facebook-official"></i>&nbsp;&nbsp;Compartir en Facebook</a>
                        <a href="{{$social['twitter']}}" class="btn btn-info nicdark_shadow nicdark_radius margin-share"><i class="icon-twitter-squared"></i>&nbsp;&nbsp;Compartir en Twitter</a>
                        <a href="{{$social['email']}}" class="btn btn-warning nicdark_shadow nicdark_radius margin-share"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Enviar por Correo</a>
                    </div>

                @elseif (isset($singlepost_articulo))

                    @if (Session::has('Error'))
                        {!!Session::get('Error')!!}
                    @endif

                    @if (Session::has('Mensaje'))
                        {!!Session::get('Mensaje')!!}
                    @endif

                    <div class="nicdark_space10"></div>

                    <div id="articuloContenido" class="contenido">

                        <div class="nicdark_space20"></div>
                        <h1 class="subtitle greydark  rojizo-0">{!! $singlepost_articulo->titulo !!}</h1>
                        <div class="nicdark_space5"></div>
                        <p class="greydark">{{$singlepost_articulo->created_at->format('d-m-Y')}}</p>
                        <div class="nicdark_space10"></div>
                        {{-- 
                            <img alt="" class="singleimage nicdark_radius img-cabecera" src="{{$singlepost_articulo->imagen}}">
                         --}}
                        <div class="nicdark_space20"></div>
                        <div>
                            {!! $singlepost_articulo->contenido !!}
                        </div>
                    </div>

                    <div class="nicdark_space20"></div>

                    <div class="contenedor-video"> 

                        {!! $singlepost_articulo->codigoembed !!}

                    </div>

                    <div class="nicdark_space20"></div>

                    <div class="grid grid_9 share">
                        <div id="whatsapp" style="display: inline;"></div>
                        
                        <a href="{{$social['facebook']}}" class="btn btn-primary nicdark_shadow nicdark_radius margin-share"><i class="fa fa-facebook-official"></i>&nbsp;&nbsp;Compartir en Facebook</a>
                        <a href="{{$social['twitter']}}" class="btn btn-info nicdark_shadow nicdark_radius margin-share"><i class="icon-twitter-squared"></i>&nbsp;&nbsp;Compartir en Twitter</a>
                        <a href="{{$social['email']}}" class="btn btn-warning nicdark_shadow nicdark_radius margin-share"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Enviar por Correo</a>
                        <a class="btn btn-default nicdark_shadow nicdark_radius margin-share" onclick="printDiv('articuloContenido')"><i class="fa fa-print"></i>&nbsp;&nbsp;&nbsp;&nbsp;Imprimir&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div>

                    <div class="nicdark_space20"></div>

                    <div class="grid grid_9">
                        <div class="nicdark_space10"></div>
                        <h3 class="subtitle greydark">Suscríbase a nuestro Newsletter</h3>
                    </div>

                    <div class="grid grid_9 nicdark_bg_grey nicdark_shadow nicdark_radius nicdark_relative">

                        <a href="#" class="nicdark_displaynone_iphoneland nicdark_displaynone_iphonepotr nicdark_btn_icon nicdark_bg_red extrabig nicdark_radius_left white nicdark_absolute"><i class="icon-pencil-2"></i></a>

                        {!!Form::open(array('route' => 'newsletterSubmit','method' => 'post'))!!}

                        <div class="nicdark_textevidence">
                            <div class="nicdark_margin1820 nicdark_marginleft100 nicdark_marginleft20_iphoneland nicdark_marginleft20_iphonepotr">
                                <div class="nicdark_focus nicdark_width_percentage25">
                                    <input class="nicdark_bg_grey2 nicdark_radius nicdark_shadow grey medium subtitle" type="text" placeholder="Ingresa tu nombre" value="" size="200" name="nombre">       
                                </div>
                                <div class="nicdark_focus nicdark_width_percentage30">
                                    <div class="nicdark_marginleft10 nicdark_disable_marginleft_iphoneland nicdark_disable_marginleft_iphonepotr">
                                        <input class="nicdark_bg_grey2 nicdark_radius nicdark_shadow grey medium subtitle" type="text" placeholder="Ingresa tu email" value="" size="200" name="email">       
                                    </div>
                                </div>
                                <div class="nicdark_focus nicdark_width_percentage20">
                                    <div class="nicdark_marginleft10 nicdark_disable_marginleft_iphoneland nicdark_disable_marginleft_iphonepotr">
                                    <select class="nicdark_bg_grey2 nicdark_radius nicdark_shadow grey small subtitle" name="grupo_id">
                                    @foreach ($grupos as $grupo)
                                        @if ($grupo->nombre != 'Todos')
                                        <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                                        @endif
                                    @endforeach
                                    </select>      
                                    </div>
                                </div>
                                <div class="nicdark_focus nicdark_width_percentage20">
                                    <div class="nicdark_marginleft20 nicdark_disable_marginleft_iphoneland nicdark_disable_marginleft_iphonepotr">
                                        <input class="nicdark_btn fullwidth nicdark_bg_red medium nicdark_shadow nicdark_radius white nicdark_press" type="submit" value="Enviar" name="Enviar">     
                                    </div>
                                </div>
                            </div>
                        </div>

                        {!!Form::close()!!}
                        {{-- Form Ends Here --}}

                    </div>

                @else

                    @if (Session::has('Error'))
                        {!!Session::get('Error')!!}
                    @endif

                    @if (Session::has('Mensaje'))
                        {!!Session::get('Mensaje')!!}
                    @endif

                    <div class="grid grid_9">
                        <div class="nicdark_space20"></div>
                        <h3 class="subtitle greydark">Suscríbase a nuestro Newsletter</h3>
                    </div>

                    <div class="grid grid_9 nicdark_bg_grey nicdark_shadow nicdark_radius nicdark_relative">

                        <a href="#" class="nicdark_displaynone_iphoneland nicdark_displaynone_iphonepotr nicdark_btn_icon nicdark_bg_red extrabig nicdark_radius_left white nicdark_absolute"><i class="icon-pencil-2"></i></a>

                        {!!Form::open(array('route' => 'newsletterSubmit','method' => 'post'))!!}

                        <div class="nicdark_textevidence">
                            <div class="nicdark_margin1820 nicdark_marginleft100 nicdark_marginleft20_iphoneland nicdark_marginleft20_iphonepotr">
                                <div class="nicdark_focus nicdark_width_percentage25">
                                    <input class="nicdark_bg_grey2 nicdark_radius nicdark_shadow grey medium subtitle" type="text" placeholder="Ingresa tu nombre" value="" size="200" name="nombre">       
                                </div>
                                <div class="nicdark_focus nicdark_width_percentage30">
                                    <div class="nicdark_marginleft10 nicdark_disable_marginleft_iphoneland nicdark_disable_marginleft_iphonepotr">
                                        <input class="nicdark_bg_grey2 nicdark_radius nicdark_shadow grey medium subtitle" type="text" placeholder="Ingresa tu email" value="" size="200" name="email">       
                                    </div>
                                </div>
                                <div class="nicdark_focus nicdark_width_percentage20">
                                    <div class="nicdark_marginleft10 nicdark_disable_marginleft_iphoneland nicdark_disable_marginleft_iphonepotr">
                                    <select class="nicdark_bg_grey2 nicdark_radius nicdark_shadow grey small subtitle" name="grupo_id">
                                    @foreach ($grupos as $grupo)
                                        @if ($grupo->nombre != 'Todos')
                                        <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                                        @endif
                                    @endforeach
                                    </select>      
                                    </div>
                                </div>
                                <div class="nicdark_focus nicdark_width_percentage20">
                                    <div class="nicdark_marginleft20 nicdark_disable_marginleft_iphoneland nicdark_disable_marginleft_iphonepotr">
                                        <input class="nicdark_btn fullwidth nicdark_bg_red medium nicdark_shadow nicdark_radius white nicdark_press" type="submit" value="Enviar" name="Enviar">     
                                    </div>
                                </div>
                            </div>
                        </div>

                        {!!Form::close()!!}
                        {{-- Form Ends Here --}}

                    </div>

                @endif

                    </div>

                <div class="nicdark_space20"></div>

            </div>

        <!--sidebar-->
        <div class="grid grid_3">

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
        <!--sidebar-->
            
        </div>
        <!--end nicdark_container-->
         
    </section>
    <!--end section-->

@section('scripts')

    {!! Theme::script('js/isMobile.min.js') !!}

<script type="text/javascript">
function printDiv(articuloContenido) {


    var printContents = document.getElementById(articuloContenido).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;

}
$(document).ready(function()
{
    var md = new MobileDetect(window.navigator.userAgent);

   if ( md.mobile() )
   {
        $(".share #whatsapp").append('<a href="whatsapp://send?text={{ $url }}" data-action="share/whatsapp/share" class="btn btn-success nicdark_shadow nicdark_radius nicdark_press nicdark_press right  pekelandia white margin-share"><i class="fa fa-whatsapp nav-icons"></i>&nbsp;&nbsp;Compartir en Whatsapp</a>');
   }

});
</script>


@stop


@stop