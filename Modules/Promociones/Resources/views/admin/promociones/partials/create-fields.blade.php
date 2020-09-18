<div class="box-body">
    <p>
      {!! Form::normalInput('titulo', 'Título', $errors) !!}
      {!! Form::normalInput('tags', 'Palabras claves (Separar por comas cada palabra)', $errors) !!}
      
      <label for='promocion-select'>Tipo Promoción</label>
	      <select class="form-control" id="promocion-select" name="tipo">
  	      <option value="Oferta">Oferta</option>
  			  <option value="Descuento">Descuento</option>
  			  <option value="Sorteo">Sorteo</option>
	      </select>

      {!! Form::normalCheckbox('mostrar', 'Mostrar', $errors) !!}

      @include('media::admin.fields.new-file-link-single', [
      'zone' => 'imagen'])

      {!! Form::normalTextarea('contenido', 'Contenido', $errors) !!}

    </p>
</div>
