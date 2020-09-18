@extends('layouts.master')

@section('title')
    Eventos | @parent
@stop

@section('meta')

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="language" content="es" />
<title>Pekelandia - Eventos</title>
<meta name="description" content="Pekelandia - Guia Infantil para padres - Eventos, Entretenimiento y Promociones">
<meta name="keywords" content="pekelandia,eventos,eventos paraguay,eventos sociales,eventos infantiles,eventos empresariales,evento culturales,eventos asunción,organización de eventos,lecturas para niños,parques infantiles,cuentos infantiles,educativas,educación,belleza,fiestas infantiles,juguetería,maternidad,padres,pekeocio,ocio,promociones,guia, infantil, padres, anuncios, directorio, jugueterias, librerias, sanatorios,peluquerias,niños,deportes,salud,decoracion,ropa,accesorios,libros,cuentos,ajuar,blanqueria,natacion,pintura">
<meta name="robots" content="index,follow">
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
</style>
@stop

@section('content')


    <!--start section-->
    <section class="nicdark_section">

        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">


            <div class="nicdark_space20"></div>

            <div class="grid grid_12">
                <h1 class="subtitle greydark  rojizo-0">EVENTOS</h1>
                <div class="nicdark_space20"></div>
            </div>

    <div class="grid grid_12 percentage">

        <div class="grid grid_9 percentage">
        <?php $i=0?>
        @foreach ($eventos as $evento)
            @if ($evento->mostrar == true)
            <div class="grid grid_3" style="max-height: 480px; height: 480px">

                <!--archive1-->
                <div class="nicdark_archive1 nicdark_bg_orange nicdark_radius nicdark_shadow" style="height: 480px">

                    <a href="{{ (url('singlepost')).'/?evento_id='.$evento->id}}" class="nicdark_btn nicdark_bg_greydark white medium nicdark_radius nicdark_absolute_left"">{{$evento->fecha->format('d')}}<br/><small>{{$fechas[$i]}}</small></a>
                    <?php $i++?>

                    <img alt=""  src="{{$evento->imagen}}" style="height: 230px">

                    <div class="nicdark_textevidence nicdark_bg_greydark">
                        <a href="{{ (url('singlepost')).'/?evento_id='.$evento->id}}">
                        <h4 class="white nicdark_margin20">{{$evento->titulo}}</h4>
                        </a>
                    </div>

                    <div class="nicdark_margin20">
                        <!--<h5 class="white"><i class="icon-pin-outline"></i> New York, Times Square</h5>
                        <div class="nicdark_space10"></div>
                        <<h5 class="white"><i class="icon-clock-1"></i> 9:00 To 14:00</h5>
                        <div class="nicdark_space20"></div>
                        <div class="nicdark_divider left small"><span class="nicdark_bg_white nicdark_radius"></span></div>-->
                        <p class="white">
                            {{ str_limit(strip_tags($evento->contenido), 130) }}
                        </p>
                        <div class="nicdark_space20"></div>
                        <div class="text-center">
                        <a href="{{ (url('singlepost')).'/?evento_id='.$evento->id}}" class="nicdark_press nicdark_btn nicdark_bg_orangedark white nicdark_radius nicdark_shadow small">Ver Más</a>
                        </div>
                        <!--<a class="nicdark_press nicdark_btn nicdark_bg_orangedark white nicdark_radius nicdark_shadow small" data-toggle="modal" 
   data-target="#shareModal">Ver Más</a>-->
                    </div>

                </div>
                <!--archive1-->

            </div>
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

    </div>

        <div class="nicdark_space20"></div>

       </div>
       <!--end nicdark_container-->

    <div class="text-center">
        {!! $eventos->render() !!}
    </div>

    </section>
    <!--end section-->
    <!--end-->


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


@section('scripts')

<script>
    $(function() {
        $('#shareModal').on("show.bs.modal");
    });
</script>

@stop


@stop
