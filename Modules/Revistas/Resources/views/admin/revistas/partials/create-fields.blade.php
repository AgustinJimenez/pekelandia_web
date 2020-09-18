<div class="box-body">
    <p>
      {!! Form::normalInput('titulo', 'Titulo', $errors) !!}
      {!! Form::normalInput('numero', 'Numero', $errors) !!}
      {!! Form::normalInput('year', 'Año', $errors) !!}
      {!! Form::normalCheckbox('mostrar', 'Mostrar', $errors) !!}
      {!! Form::normalInput('codigoembed', 'Codigo embed', $errors) !!}
    </p>

    @include('media::admin.fields.new-file-link-single', [
    	'zone' => 'imagen'
	   ])
	
</div>
