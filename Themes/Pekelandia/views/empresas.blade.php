@extends('layouts.master')

@section('title')
    Educación | @parent
@stop

@section('meta')

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="language" content="es" />
<title>Pekelandia - Empresas</title>
<meta name="description" content="Pekelandia - Guia Infantil para padres - Empresas publicitadas">
<meta name="keywords" content="pekelandia,empresas,anuncios,publicidad,empresas paraguay,escolar,colegios,infantiles,comerciales,empresariales,empresarios,educativas,belleza,fiestas infantiles,juguetería,maternidad,padres,pekeocio,ocio,promociones,guia, infantil, padres, anuncios, directorio, jugueterias, librerias, sanatorios,peluquerias,niños,deportes,salud,decoracion,ropa,accesorios,libros,cuentos,ajuar,blanqueria,natacion,pintura">
<meta name="robots" content="index,follow">
<meta name="author" content="http://zentcode.com">

@stop

@section('style')

@stop

@section('content')


<!--start section-->
<section class="nicdark_section">

<div class="nicdark_container nicdark_clearfix">

    <div class="grid grid_12 percentage">

    <div class="nicdark_space10"></div>

        <div class="grid grid_3">
            
            <div class="grid grid_3">
                <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">
                    <div class="nicdark_textevidence nicdark_bg_blue nicdark_radius_top" style="background-color: #{{$color}};box-shadow: 0px 4px 0px 0px #{{$subcolor}};">
                        <h4 class="white nicdark_margin20">FILTRO POR CATEGORIA</h4>
                        <i class="icon-search-outline nicdark_iconbg right medium blue" style="color: #{{$subcolor}};"></i>
                    </div>
                    <div class="nicdark_margin20">


                    <h4>País:</h4>
                    <div class="nicdark_space10"></div>

                        <select class="nicdark_bg_grey2 nicdark_radius nicdark_shadow grey small subtitle" id="pais_id" name="pais_id">

                            <option value="all">Todos</option>

                            @foreach ($paises as $pais)

                              <option value="{{$pais->id}}">{{$pais->nombre}}</option>

                            @endforeach

                        </select>

                    <div class="nicdark_space10"></div>
                    <h4>Ciudad:</h4>
                    <div class="nicdark_space10"></div>

                        <select class="nicdark_bg_grey2 nicdark_radius nicdark_shadow grey small subtitle" id="ciudad_id" name="ciudad_id">

                            <option value="" selected="">--</option>

                            @foreach ($ciudades as $ciudad)

                            <option value="{{ $ciudad->id }}" class="{{$ciudad->pais_id}}">{{ $ciudad->nombre }}</option>

                            @endforeach

                        </select>

                        <div class="nicdark_space20"></div>
                        <input id="btnEmpresa" class="nicdark_btn nicdark_bg_blue medium nicdark_shadow nicdark_radius white nicdark_press" type="submit" value="BUSCAR" style="background-color: #{{$color}};box-shadow: 0px 4px 0px 0px #{{$subcolor}};">
                    </div>
                </div>
            </div>

            <div class="nicdark_space10"></div>

                @include('partials.sidebar')
        </div>

            <!--GET IDS DE LAS CATEGORIAS-->
            @if (isset($categoria))
                <input type="hidden" id="filtrocat" name="filtrocat" value="{{$categoria->id}}"/>
            @elseif (isset($sidebars))
                <input type="hidden" id="filtrosubcat" name="filtrosubcat" value="{{$sidebars->id}}"/>
            @endif


        <!--start nicdark_masonry_container-->
        <div id="empresas-container" class="grid grid_9 nicdark_masonry_container">

        @foreach ($empresas as $index => $empresa)
            <div class="grid grid_4 nicdark_masonry_item educational">
                <div class="nicdark_archive3 nicdark_bg_blue nicdark_radius nicdark_shadow" style="background-color: #{{$color}};box-shadow: 0px 4px 0px 0px #{{$subcolor}};">
                    
                    <a class="nicdark_zoom nicdark_btn_icon nicdark_bg_blue nicdark_border_bluedark white medium nicdark_radius_circle nicdark_absolute_left" data-toggle="modal" data-target=".bd-example-modal-lg{{$empresa->id}}" style="background-color: #{{$color}};border: 2px solid #{{$subcolor}};"><i class="icon-location-outline"></i></a>

                    <img alt=""  src="{{$empresa->imagen}}">

                    <div class="nicdark_space20"></div>
                    <h4 class="white text-center">{{$empresa->nombre}}</h4>

                    <div class="nicdark_margin20" style="margin-top: 10px;">
                        <p class="white"><strong>Ciudad:</strong> {{$empresa->ciudad->nombre}}</p>
                        <p class="white"><strong>Rubro:</strong> {{$empresa->rubro}}</p>
                        <p class="white"><strong>Dirección:</strong> {{$empresa->direccion}}</p>
                        <p class="white"><strong>Teléfono:</strong> {{$empresa->telefono}}</p>
                        <p class="white"><strong>E-mail:</strong> {{$empresa->email}}</p>
                        <p class="white"><strong>Web:</strong> {{$empresa->web}}</p>            
                    </div>

                    <i class="icon-camera-outline nicdark_iconbg right medium blue" style="color: #{{$subcolor}};"></i>

                </div>

                <div class="nicdark_space10"></div> 
                <div class="nicdark_archive1 nicdark_bg_greydark nicdark_radius nicdark_shadow">
                    <div class="grid grid_4" style="height: 50px;">
                    @if (isset($anuncios[$index]))
                        <a href="{{$anuncios[$index]->vinculo}}" target="_blank">
                            <img src="{{$anuncios[$index]->imagen}}" style="padding-right: 20px; height: 50px;">
                        </a>
                    @endif
                    </div>
                </div>

            </div>

            <div class="modal bd-example-modal-lg{{$empresa->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  {!!$empresa->mapa!!}
                </div>
              </div>
            </div>
        @endforeach

        </div>
        <!--end nicdark_masonry_container-->

        <div class="nicdark_space20"></div>

        </div>

    </div>
    <!--end nicdark_container-->

    <div class="text-center">
        {!! $empresas->appends([$url_query_string => $id])->render() !!}
    </div>

</section>
<!--end section-->

<!--end-->

@section('scripts')
{!! Theme::script('js/vendor/jquery.chained.min.js') !!}
<script type="text/javascript">
    function htmlbodyHeightUpdate(){
        var height3 = $( window ).height()
        var height1 = $('.nav').height()+50
        height2 = $('.main').height()

            if(height2 > height3){
                $('html').height(Math.max(height1,height3,height2)+10);
                $('body').height(Math.max(height1,height3,height2)+10);
            }
            else
            {
                $('html').height(Math.max(height1,height3,height2));
                $('body').height(Math.max(height1,height3,height2));
            }
        
    }

    $(document).ready(function () {

        //alert($('#filtrocat').val());
        //alert($('#filtrosubcat').val());

        $("#ciudad_id").chained("#pais_id");

        $("#btnEmpresa").click(function() {
            //console.log('entra');
            //console.log($('#selectEmpresa').val());
            
            var pais_id = $('#pais_id').val();
            var ciudad_id = $('#ciudad_id').val();
            var categoria_id = $('#filtrocat').val();

            if (ciudad_id == '') {

                window.location.href = 'filter/' + categoria_id + '/' + pais_id + '/' + 'all';

            } else {

                window.location.href = 'filter/' + categoria_id + '/' + pais_id + '/' + ciudad_id;

            }


        });

        htmlbodyHeightUpdate()
        $( window ).resize(function() {
            htmlbodyHeightUpdate()
        });
        $( window ).scroll(function() {
            height2 = $('.main').height()
            htmlbodyHeightUpdate()
        });
    });
</script>
@stop


@stop
