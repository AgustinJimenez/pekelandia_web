@extends('layouts.master')

@section('content-header')

<h1>Newsletter - Enviar e-mail a lista</h1>

@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
    
@stop

@section('content')

<section class="content">

	<div class="row">

	<div class="col-xs-12">

		<div class="box-body">

				@if (session('status'))
				    <div class="alert alert-success">
				    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				        {{ session('status') }}
				    </div>
				@endif

			{!! Form::open(['route' => 'admin.newsletter.emails.sendEmail', 'method' => 'POST']) !!}

					<div class="form-group row">
					  <div class="col-md-6">
					  <label for="grupo" class="form-check-label">Grupo:</label>
					    <select class="form-control" id="grupo" name="grupo">
					    	@foreach ($grupos as $grupo)
					    		@if($grupo->nombre == 'Todos')
              					<option value="{{$grupo->nombre}}" selected="">{{$grupo->nombre}}</option>
              					@else
              					<option value="{{$grupo->id}}">{{$grupo->nombre}}</option>
              					@endif
              				@endforeach
					    </select>
					  </div>
					</div>
					<div class="form-group row">
					  <div class="col-md-6">
					  <label for="asunto" class="form-check-label">Asunto:</label>
					    <input class="form-control" type="text" id="asunto" name="asunto" placeholder="Ingrese el Asunto" required="">
					  </div>
					</div>
					<div class="form-group row">
					  <div class="col-md-12">
					    {!! Form::normalTextarea('mensaje', 'Contenido:', $errors) !!}
					  </div>
					</div>
					<button type="submit" class="btn btn-primary pull-right">Enviar</button>

			{!! Form::close() !!}
					<a href="{{ route('admin.newsletter.emails.emailsEnviados') }}" class="btn btn-default pull-right" style="margin-right: 5px;">Cancelar</a>

		</div>
	</div>

	</div>

</section>

@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')

<script type="text/javascript">
window.onload = function() {
	document.getElementById("asunto").value = ''
	document.getElementById("mensaje").value = ''
	document.getElementById("asunto").required;
	document.getElementById("mensaje").required;
}
</script>

@stop
