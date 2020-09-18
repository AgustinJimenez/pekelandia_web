@extends('layouts.master')

@section('title')
    Sumá tu negocio | @parent
@stop

@section('meta')

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="language" content="es" />
<title>Pekelandia - Sumá tu negocio</title>
<meta name="description" content="Pekelandia - Guia Infantil para padres - Sumá tu negocio">
<meta name="keywords" content="suma tu negocio,publicidad,anuncios,negocios,publicar,planes,guia, infantil, padres, anuncios, directorio, jugueterias, librerias, sanatorios,peluquerias,niños,deportes,salud,decoracion,ropa,accesorios,libros,cuentos,ajuar,blanqueria,natacion,pintura,sociales,publicaciones">
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

        <div class="grid grid_12">
            <div class="nicdark_space20"></div>
            <h1 class="subtitle greydark  rojizo-0">Sumá tu negocio!</h1>
            <div class="nicdark_space20"></div>
            <h3 class="subtitle greydark  rojizo-0">Es un buen día para empezar algo nuevo, hacé crecer tu empresa en Pekelandia.</h3>
            <div class="nicdark_space20"></div>
            <div class="nicdark_divider left small"><span class="nicdark_bg_greydark nicdark_radius"></span></div>
            <div class="nicdark_space10"></div>
        </div>

        @foreach ($publicidades as $publicidad)

        <div class="grid grid_4">
                    
            <div class="nicdark_archive1 center nicdark_bg_blue nicdark_shadow nicdark_radius" style="max-height: 457px;min-height: 457px;">
                
                
                <div class="nicdark_textevidence nicdark_bg_greydark nicdark_radius_top">
                    <h4 class="white nicdark_margin20">{{$publicidad->titulo}}</h4>
                </div>

                <div class="nicdark_textevidence nicdark_bg_grey" style="height: 200px;">
                    <div class="nicdark_margin20">
                        <ul class="nicdark_list border">
                            <li class="nicdark_border_grey">
                                <p style="font-weight: normal; font-size: 16px;">Incluí tu promoción en nuestra pagina!</p>
                                <div class="nicdark_space10"></div>
                            </li>
                            <li class="nicdark_border_grey">
                                <div class="nicdark_space10"></div>
                                <p style="font-weight: bold; font-size: 16px;">{{$publicidad->descripcion}}</p>
                                <div class="nicdark_space10"></div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="nicdark_archive1">
                    <div class="nicdark_filter blue">

                        <div class="nicdark_space40"></div>
                        
                        <h3 class="white subtitle">{{$publicidad->plan}}</h3>
                        <div class="nicdark_space20"></div>
                        <div class="nicdark_divider small"><span class="nicdark_bg_white nicdark_radius"></span></div>

                        <div class="nicdark_space40"></div>

                    </div>
                </div>

                <a href="{{ (url('formulario')).'/?plan='.$publicidad->orden}}" class="nicdark_press white nicdark_btn nicdark_bg_bluedark medium nicdark_radius nicdark_shadow">Continuar&nbsp;&nbsp;&nbsp;
                <i class="fa fa-chevron-right"></i></a>

            </div>
        
        </div>

        @endforeach


        <div class="grid grid_12">
            <div class="nicdark_space10"></div>
            <p class="subtitle greydark">(*) Todos los precios incluyen IVA. Contrato mensual con renovación automática.</p>
        </div>

        <div class="nicdark_space50"></div>

    </div>

</section>


@section('scripts')

@stop


@stop