@extends('layouts.master')

@section('title')
    Educación | @parent
@stop

@section('meta')

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="language" content="es" />
<title>Pekelandia - Buscador</title>
<meta name="description" content="Buscador">
<meta name="keywords" content="">
<meta name="author" content="http://zentcode.com">

@stop

@section('style')

<style type="text/css">
.modal-content iframe {
    width: 100%;
    height: 400px;
    margin: 0;
    padding: 0;
}
</style>

@stop

@section('content')


<!--start section-->
<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">
    <!--<div class="nicdark_container1 nicdark_clearfix1">-->

        @if (isset($empresas))

            <div class="nicdark_space20"></div>

            <div class="grid grid_12">
                <h1 class="subtitle greydark">FILTRO EMPRESAS</h1>
                <div class="nicdark_space20"></div>
            </div>

        @else

            <div class="nicdark_space20"></div>

            <div class="grid grid_12">
                <h1 class="subtitle greydark">RESULTADOS DE LA BUSQUEDA</h1>
                <div class="nicdark_space10"></div>
            </div>
            
        @endif

        @if (isset($empresas))

        <!--start nicdark_masonry_container-->
        <div class="nicdark_masonry_container">

        @foreach ($empresas as $empresa)

        <!--<div class="grig grid_9 nicdark_masonry_container">-->
            <div class="grid grid_4 nicdark_masonry_item educational">
                <div class="nicdark_archive3 nicdark_bg_blue nicdark_radius nicdark_shadow">
                    
                    <a class="nicdark_zoom nicdark_btn_icon nicdark_bg_blue nicdark_border_bluedark white medium nicdark_radius_circle nicdark_absolute_left" data-toggle="modal" data-target=".bd-example-modal-lg{{$empresa->id}}"><i class="icon-location-outline"></i></a>

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

                    <i class="icon-camera-outline nicdark_iconbg right medium blue"></i>

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

        @endif

     <div class="grid grid_9">

        @if (isset($results) && $results->isEmpty() == false)

        @foreach ($results as $key => $result)

        @if (isset($result->codigoembed))

            <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">

                <div class="nicdark_textevidence nicdark_width_percentage40 nicdark_width100_responsive">
                    <img alt=""  class="nicdark_radius_left" src="{{$result->imagen}}" style="height: 230px;">
                </div>
                
                <div class="nicdark_textevidence nicdark_width_percentage50 nicdark_width100_responsive">
                    <div class="nicdark_margin20">
                    
                        <h4><a href="{{ (url('singlepost')).'/?articulo_id='.$result->id}}">{{$result->titulo}}</a></h4>                        
                        <div class="nicdark_space10"></div>
                        <p>{{$result->created_at->format('d-m-Y')}}</p>
                        <div class="nicdark_space10"></div>
                        <p>{{ str_limit(strip_tags($result->contenido), 180) }}</p>
                        <div class="nicdark_space20"></div>
                        <a href="{{ (url('singlepost')).'/?articulo_id='.$result->id}}" class="white nicdark_btn nicdark_bg_greydark small nicdark_radius nicdark_shadow nicdark_press">Leer Más</a>

                    </div>
                </div>

            </div>
            <div class="nicdark_space20"></div>

        @endif

        @if (isset($result->fecha))

            <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">

                <div class="nicdark_textevidence nicdark_width_percentage40 nicdark_width100_responsive">
                    <img alt=""  class="nicdark_radius_left" src="{{$result->imagen}}" style="height: 230px;">
                </div>
                
                <div class="nicdark_textevidence nicdark_width_percentage50 nicdark_width100_responsive">
                    <div class="nicdark_margin20">
                    
                        <h4><a href="{{ (url('singlepost')).'/?evento_id='.$result->id}}">{{$result->titulo}}</a></h4>                        
                        <div class="nicdark_space10"></div>
                        <p>{{$result->fecha->format('d-m-Y')}}</p>
                        <div class="nicdark_space10"></div>
                        <p>{{ str_limit(strip_tags($result->contenido), 180) }}</p>
                        <div class="nicdark_space20"></div>
                        <a href="{{ (url('singlepost')).'/?evento_id='.$result->id}}" class="white nicdark_btn nicdark_bg_greydark small nicdark_radius nicdark_shadow nicdark_press">Leer Más</a>

                    </div>
                </div>

            </div>
            <div class="nicdark_space20"></div>
        @endif

        @if (isset($result->tipo))

            <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">

                <div class="nicdark_textevidence nicdark_width_percentage40 nicdark_width100_responsive">
                    <img alt=""  class="nicdark_radius_left" src="{{$result->imagen}}" style="height: 230px;">
                </div>
                
                <div class="nicdark_textevidence nicdark_width_percentage50 nicdark_width100_responsive">
                    <div class="nicdark_margin20">
                    
                        <h4><a href="{{ (url('singlepost')).'/?promocion_id='.$result->id}}">{{$result->titulo}}</a></h4>     
                        <div class="nicdark_space10"></div>
                        <p>{{ str_limit(strip_tags($result->contenido), 180) }}</p>
                        <div class="nicdark_space20"></div>
                        <a href="{{ (url('singlepost')).'/?promocion_id='.$result->id}}" class="white nicdark_btn nicdark_bg_greydark small nicdark_radius nicdark_shadow nicdark_press">Leer Más</a>

                    </div>
                </div>

            </div>
            <div class="nicdark_space20"></div>

        @endif

        @if (isset($result->mapa))

            <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">

                <div class="nicdark_textevidence nicdark_width_percentage40 nicdark_width100_responsive">

                    <a href="#" class="nicdark_zoom nicdark_btn_icon nicdark_bg_greydark nicdark_border_greydark white medium nicdark_radius_circle nicdark_absolute_left" data-toggle="modal" data-target=".bd-example-modal-lg{{$result->id}}"><i class="icon-location-outline"></i></a>

                    <img alt=""  class="nicdark_radius_left" src="{{$result->imagen}}" style="height: 230px;">
                </div>
                
                <div class="nicdark_textevidence nicdark_width_percentage50 nicdark_width100_responsive">
                    <div class="nicdark_margin20">
                    
                        <h4>{{$result->nombre}}</h4>     
                        <div class="nicdark_space10"></div>
                        <p><strong>Ciudad:</strong> {{$result->ciudad->nombre}}</p>
                        <div class="nicdark_space5"></div>
                        <p><strong>Rubro:</strong> {{$result->rubro}}</p>
                        <div class="nicdark_space5"></div>
                        <p><strong>Dirección:</strong> {{$result->direccion}}</p>
                        <div class="nicdark_space5"></div>
                        <p><strong>Teléfono:</strong> {{$result->telefono}}</p>
                        <div class="nicdark_space5"></div>
                        <p><strong>E-mail:</strong> {{$result->email}}</p>
                        <div class="nicdark_space5"></div>
                        <p><strong>Web:</strong> {{$result->web}}</p>  
                        <div class="nicdark_space5"></div>

                    </div>
                </div>

            </div>
            <div class="nicdark_space20"></div>

            <div class="modal bd-example-modal-lg{{$result->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  {!!$result->mapa!!}
                </div>
              </div>
            </div>

        @endif

        @endforeach

        @endif

        @if (isset($results) && $results->isEmpty())

                <h3 class="subtitle greydark">No se han obtenido resultados. Verifique su búsqueda e intente de nuevo.</h3>
                <div class="nicdark_space10"></div>

        @endif

    </div>
    <!--end grid_9-->

        <div class="nicdark_space20"></div>

    </div>
    <!--end nicdark_container-->

    <div class="text-center">
        @if (isset($empresas))
            {!! $empresas->render() !!}
        @endif
        @if (isset($results))
            {!! $results->render() !!}
        @endif
    </div>

</section>
<!--end section-->

<!--end-->

@section('scripts')
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
