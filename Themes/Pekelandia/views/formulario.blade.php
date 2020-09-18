@extends('layouts.master')

@section('title')
    Sumá tu negocio | @parent
@stop

@section('meta')

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="language" content="es" />
<title>Pekelandia - Formulario de Suscripción</title>
<meta name="description" content="Formulario de Suscripción">
<meta name="keywords" content="">
<meta name="author" content="http://zentcode.com">

@stop

@section('style')

<style type="text/css">
    .form-container{padding:10px;}
</style>
@stop

@section('content')


<!--start section-->
<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">

        @if (Session::has('Error'))
            {!!Session::get('Error')!!}
        @endif

        @if (Session::has('Mensaje'))
            {!!Session::get('Mensaje')!!}
        @endif

        <div class="grid grid_6">
            <!--title-->
            <div class="nicdark_space20"></div>
            <h3 class="subtitle greydark">Regístrate para publicar tu anuncio en Pekelandia</h3>
            <div class="nicdark_space20"></div>
            <!--title--> 

            <div class="nicdark_archive1 nicdark_bg_grey nicdark_radius nicdark_shadow">

            {!!Form::open(array('route' => 'suscriptoresSubmit','method' => 'post', 'file' => true, 'enctype' => 'multipart/form-data'))!!}

			<div class="form-container">
			  <div class="form-group">
			    <label for="nombre">Nombre y Apellido</label>
			    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
			  </div>
			  <div class="nicdark_space10"></div>
			  <div class="form-group">
			    <label for="telefono">Teléfono</label>
			    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Número de teléfono">
			  </div>
			  <div class="nicdark_space10"></div>
			  <div class="form-group">
			    <label for="email">Correo electrónico</label>
			    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Ingrese su correo">
			    <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su dirección de correo electrónico.</small>
			  </div>
			  <div class="form-group">
			    <label for="imagen">*Cargue su imagen:</label>
			    <input type="file" class="form-control-file" id="imagen" name="imagen" aria-describedby="fileHelp">
			    <div class="nicdark_space10"></div>
			    <p><small id="fileHelp" class="form-text text-muted">La imagen debe ser una imagen .jpg, .png o .gif</small></p>

                @if (Session::has('mensaje'))
                    <p><small class="form-text text-muted">{!!Session::get('mensaje')!!}</small></p>
                @endif
			  </div>
			  <div class="form-group">
			    <label for="comentario">Comentario</label>
			    <textarea class="form-control" id="comentario" name="comentario" placeholder="Comentario para Pekelandia"></textarea>
			  </div>
			  <div class="nicdark_space10"></div>
			  <input type="hidden" name="plan" id="plan" value="{{$plan->titulo}}">
			  <input type="hidden" name="secciones" id="secciones" value="{{$plan->descripcion}}">
			  <input type="hidden" name="precio" id="precio" value="{{$plan->plan}}">
			  <button type="submit" id="enviar" name="enviar" class="btn btn-primary nicdark_radius">Enviar</button>
			</div>

            {!!Form::close()!!}
            {{-- Form Ends Here --}}

			</div>

        </div>

        <div class="nicdark_space20"></div>


    </div>

</section>


@section('scripts')

@stop


@stop