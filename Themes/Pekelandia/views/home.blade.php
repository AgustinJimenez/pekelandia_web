@extends('layouts.master')

@section('title')
    {{ $page->title }} Home | @parent
@stop

@section('meta')
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="language" content="es" />
    <title>Pekelandia - Guia Infantil para padres</title>
    <meta name="description" content="Pekelandia - Guia Infantil para padres">
    <meta name="keywords" content="guia, infantil, padres, anuncios, directorio, jugueterias, librerias, sanatorios,peluquerias,niños,deportes,eventos,educacion,salud,belleza,decoracion,ropa,accesorios,jugueteria,libros,cuentos,ajuar,blanqueria,natacion,pintura,promociones,ofertas,sorteos,ocios,maternidad,paternidad,colegios,publicaciones,artículos">
    <meta name="author" content="http://zentcode.com">
@stop

@section('style')
<style type="text/css">
    p {
        color: white;
    }
    .in {
        background: rgba(0, 0, 0, 0.3);
    }
    .nicdark_site{padding-top: 0px;}
    .anuncio-wrapper{
        height: 190px; 
        width: 92%; 
        margin-top: 0px;
    }
</style>
@stop

@section('content')

<!--Seccion de Sliders-->
<!--start section-->
<section id="home-section" class="nicdark_section" style="background-color: #BCBCBC">

    <!--start nicdark_container-->
    <div id="intro-section" class="nicdark_container nicdark_clearfix">


        <div class="grid grid_3" style="height: 400px;">

            <!--start table-->
            <div class="nicdark_textevidence nicdark_bg_grey nicdark_shadow nicdark_radius left" style="height: 400px;overflow-y:auto;">  
                <table class="nicdark_table medium nicdark_bg_red nicdark_radius">
                    <thead class="nicdark_border_red">
                        <tr>
                            <td><h4 class="white text-center"><a class="white" href="{{ (url('articulos')) }}">ARTÍCULOS </a></h4></td>
                        </tr>
                    </thead>
                    <tbody class="nicdark_bg_grey nicdark_border_grey">
                    @foreach ($articulos as $articulo)
                        @if ($articulo->mostrar == true)
                        <tr>
                            <td><h5 style="color: #666666;">{{$articulo->titulo}}</h5>
                            <p style="color: #666666; padding-top: 2px;">{{$articulo->created_at->format('d-m-Y')}}</p>
                            <a href="{{ (url('singlepost')).'/?articulo_id='.$articulo->id}}" class="white nicdark_btn nicdark_bg_red small nicdark_radius nicdark_shadow nicdark_press" style="float: right;">Leer Más</a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                        <tr class="nicdark_bg_red nicdark_border_red">
                            <td>
                            <p class="text-center"><a class="white" href="{{ (url('articulos')) }}">Ver más artículos</a></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--end table-->

        </div>


        <div class="grid grid_6" style="height: 400px;">

            <!--archive1-->
            <div class="nicdark_archive1 nicdark_radius nicdark_shadow" style="height: 400px;">


                <div id="owl-galeria" class="owl-carousel owl-theme" style="height: 400px;">

                @foreach ($galerias as $galeria)
                    
                    <div class="item" style="height: 400px;">
                            <img src="{{$galeria->imagen}}" alt="" style="width:100%; height: 100%;">
                        <div class="text nicdark_radius nicdark_shadow" style="bottom: 0px; background-color: rgba(0,0,0,.5)">
                            <a href="{!!$galeria->vinculo!!}" target="_blank">
                                <h4 class="white">{{$galeria->titulo}}</h4>
                            </a>
                            {{$galeria->descripcion}}
                        </div>
                    </div>

                @endforeach
                    
                </div>

            </div>
            <!--archive1-->

        </div>


        <div class="grid grid_3" style="height: 400px;">

            <!--archive1-->
            <div class="nicdark_archive1 nicdark_radius nicdark_bg_greydark nicdark_shadow" style="height: 400px;">

            @foreach ($anuncios as $anuncio)
                @if ($anuncio->orden == 1)

                <div class="nicdark_margin10" style="height: 190px; width: 92%; margin-bottom: 0px;">
                    <a href="{{$anuncio->vinculo}}" target="_blank">
                        <img src="{{$anuncio->imagen}}" style="width:100%; height: 100%;border-radius: 5px 5px 5px 5px;">
                    </a>
                </div>
                @elseif ($anuncio->orden == 2)

                <div class="nicdark_margin10 anuncio-wrapper">
                    <a href="{{$anuncio->vinculo}}" target="_blank">
                        <img src="{{$anuncio->imagen}}" style="width:100%; height: 100%;border-radius: 5px 5px 5px 5px;">
                    </a>
                </div>
                @endif
            @endforeach

            </div>
            <!--archive1-->

        </div>


    </div>

        <div class="nicdark_space50"></div>
   <!--end nicdark_container-->

</section>
<!--end section-->


<!--start section-->
<section class="nicdark_section nicdark_margintop45_negative">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">

		<!--Tarjetas de Pekelandia-->
		<div class="grid grid_12 percentage nomargin" >

			<div class="nicdark_textevidence center">
			    <div class="nicdark_textevidence nicdark_width_percentage25 nicdark_bg_blue nicdark_shadow nicdark_radius_left">
			        <div class="nicdark_textevidence nicdark_zoom">
			            <div class="nicdark_margin30">
			                <h2 class="white subtitle"><a class="white" href="{{ (url('videos')) }}">VIDEOS</a></h2>
			           </div>
                        <a href="{{ (url('videos')) }}">
			            <i class="icon-video nicdark_iconbg left extrabig blue nicdark_displaynone_ipadland nicdark_displaynone_ipadpotr"></i></a>
			        </div>
			    </div>

                <div class="nicdark_textevidence nicdark_width_percentage25 nicdark_bg_orange nicdark_shadow">
                    <div class="nicdark_textevidence nicdark_zoom">
                        <div class="nicdark_margin30">
                            <h2 class="white subtitle"><a class="white" href="{{ (url('eventos')) }}">EVENTOS</a></h2>
                       </div>
                        <a href="{{ (url('eventos')) }}">
                        <i class="icon-users nicdark_iconbg left extrabig orange nicdark_displaynone_ipadland nicdark_displaynone_ipadpotr"></i></a>
                    </div>
                </div>

			    <div class="nicdark_textevidence-1 nicdark_width_percentage25 nicdark_bg_yellow nicdark_shadow">
			        <div class="nicdark_textevidence nicdark_zoom">
			            <div class="nicdark_margin30">
			                <h2 class="white subtitle"><a class="white" href="{{ (url('sumatunegocio')) }}">PUBLICIDAD</a></h2>
                            <h6 class="subtitulo">Suma tu negocio</h6>
			           </div>
                        <a href="{{ (url('sumatunegocio')) }}">
			            <i class="icon-check nicdark_iconbg left extrabig yellow nicdark_displaynone_ipadland nicdark_displaynone_ipadpotr"></i></a>
			        </div>
			    </div>
			    <div class="nicdark_textevidence nicdark_width_percentage25 nicdark_bg_green nicdark_shadow nicdark_radius_right">
			        <div class="nicdark_textevidence nicdark_zoom">
			            <div class="nicdark_margin30">
			                <h2 class="white subtitle"><a class="white" href="{{ (url('revistas')) }}">REVISTAS</a></h2>
			           </div>
                        <a href="{{ (url('revistas')) }}">
			            <i class="icon-doc-2 nicdark_iconbg left extrabig green nicdark_displaynone_ipadland nicdark_displaynone_ipadpotr"></i></a>
			        </div>
			    </div>

			    <div class="nicdark_space5"></div>

			</div>

		</div>

	</div>
    <!--end nicdark_container-->

</section>
<!--end section-->

<!--start section-->
<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">


        <div class="nicdark_space30"></div>


        <div class="grid grid_12">
            <h1 class="subtitle greydark rojizo-0">NUESTROS EVENTOS</h1>
            <div class="nicdark_space20"></div>
            <h3 class="subtitle grey rojizo-0">NO TE PIERDAS NUESTROS EVENTOS</h3>
            <div class="nicdark_space20"></div>
            <div class="nicdark_divider left big"><span class="nicdark_bg_green nicdark_radius"></span></div>
            <div class="nicdark_space10"></div>
        </div>


        <?php $i=0?>
        @foreach ($eventos as $evento)
            @if ($evento->mostrar == true & $evento->destacado == true)
            <div class="grid grid_3">

                <!--archive1-->
                <div class="nicdark_archive1 nicdark_bg_orange nicdark_radius nicdark_shadow card-grid">

                    <a href="{{ (url('singlepost')).'/?evento_id='.$evento->id}}" class="nicdark_btn nicdark_bg_greydark white medium nicdark_radius nicdark_absolute_left"">{{$evento->fecha->format('d')}}<br/><small>{{$fechas[$i]}}</small></a>
                    <?php $i++?>

                    <img alt=""  src="{{$evento->imagen}}" style="height: 230px">

                    <div class="nicdark_textevidence nicdark_bg_greydark">
                        <a href="{{ (url('singlepost')).'/?evento_id='.$evento->id}}">
                        <h4 class="white nicdark_margin20">{{$evento->titulo}}</h4>
                        </a>
                    </div>

                    <div class="nicdark_margin20">
                        <p class="white">{{ str_limit(strip_tags($evento->contenido), 130) }}</p>
                        <div class="nicdark_space20"></div>
                        <div class="text-center">
                            <a href="{{ (url('singlepost')).'/?evento_id='.$evento->id}}" class="nicdark_press nicdark_btn nicdark_bg_orangedark white nicdark_radius nicdark_shadow small">Ver Más</a>
                        </div>
                    </div>

                </div>
                <!--archive1-->

            </div>
            @endif
        @endforeach


        <!-- SHARE POPUP -->
        <div class="modal fade" id="shareModal" 
             tabindex="-1" role="dialog" style="display: none;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" 
                  data-dismiss="modal" 
                  aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Comparte!</h4>
              </div>
              <div class="modal-body" align="center">

                <div class="nicdark_margin100">
                    <a href="#" class="nicdark_zoom nicdark_mpopup_iframe nicdark_btn nicdark_bg_red medium nicdark_shadow nicdark_radius white"><i class="fa fa-youtube-square"></i>&nbsp;&nbsp;&nbsp;YOUTUBE</a>&nbsp;&nbsp;&nbsp;&nbsp;
                </div></br>
                <div class="nicdark_margin100">
                    <a href="http://www.facebook.com" target="_blank" class="nicdark_zoom nicdark_mpopup_iframe nicdark_btn nicdark_bg_bluedark medium nicdark_shadow nicdark_radius white"><i class="fa fa-facebook-official"></i>&nbsp;&nbsp;&nbsp;FACEBOOK</a>&nbsp;&nbsp;&nbsp;&nbsp;
                </div></br>
                <div class="nicdark_margin100">
                    <a href="#" class="nicdark_zoom nicdark_mpopup_iframe nicdark_btn nicdark_bg_blue medium nicdark_shadow nicdark_radius white"><i class="icon-twitter-squared"></i>&nbsp;&nbsp;&nbsp;TWITTER</a>&nbsp;&nbsp;&nbsp;&nbsp;
                </div></br>
                <div class="nicdark_margin100">
                    <a href="#" class="nicdark_zoom nicdark_mpopup_iframe nicdark_btn nicdark_bg_greydark medium nicdark_shadow nicdark_radius white"><i class="fa fa-instagram"></i>&nbsp;&nbsp;&nbsp;INSTAGRAM</a>&nbsp;&nbsp;&nbsp;&nbsp;
                </div></br>
                <div class="nicdark_margin100">
                    <a href="#" class="nicdark_zoom nicdark_mpopup_window nicdark_btn nicdark_bg_orange medium nicdark_shadow nicdark_radius white"><i class="fa fa-rss-square"></i>&nbsp;&nbsp;&nbsp;BLOGGER</a>&nbsp;&nbsp;&nbsp;&nbsp;
                </div></br>

                <div class="nicdark_margin100">
                    <a href="#" class="nicdark_zoom nicdark_mpopup_window nicdark_btn nicdark_bg_green medium nicdark_shadow nicdark_radius white"><i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;MAIL</a>&nbsp;&nbsp;&nbsp;&nbsp;
                </div></br>

              </div>
              <div class="modal-footer">
                <a
                   class="nicdark_press nicdark_btn nicdark_bg_orangedark white nicdark_radius nicdark_shadow small tex" 
                   data-dismiss="modal">Cerrar</a>
                <!--<span class="pull-right">
                  <button type="button" class="btn btn-primary">
                    Add to Favorites
                  </button>
                </span>-->
              </div>
            </div>
          </div>
        </div>
        <!-- SHARE POPUP -->


        <div class="grid grid_3">

            <!--archive1-->
            <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow card-grid">

            @foreach ($anuncios as $anuncio)
                @if ($anuncio->orden == 3)
                <div class="nicdark_margin10" style="height: 230px; width: 92%; margin-bottom: 0px;">
                    <a href="{{$anuncio->vinculo}}" target="_blank">
                        <img src="{{$anuncio->imagen}}" style="width:100%; height: 100%;border-radius: 5px 5px 5px 5px;">
                    </a>
                </div>

                @elseif ($anuncio->orden == 4)

                <div class="nicdark_margin10" style="height: 230px; width: 92%; margin-top: 0px;">
                    <a href="{{$anuncio->vinculo}}" target="_blank">
                        <img src="{{$anuncio->imagen}}" style="width:100%; height: 100%;border-radius: 5px 5px 5px 5px;">
                    </a>
                </div>
                @endif
            @endforeach

            </div>
            <!--archive1-->

        </div>

        <div class="nicdark_space30"></div>

   </div>
   <!--end nicdark_container-->

</section>
<!--end section-->
<!--end-->

@section('scripts')
{!! Theme::script('plugins/revslider/jquery.themepunch.tools.min.js') !!}

<script type="text/javascript">
	jQuery(document).ready(function() {

    $('#owl-galeria').owlCarousel({
        items:1,
        loop:true,
        center:true,
        dots:true,
        autoplay:true,
        autoplayTimeout:10000,
        autoplayHoverPause:true,
    });

    });
</script>
@stop


@stop
