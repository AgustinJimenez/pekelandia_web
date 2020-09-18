<div class="box-body">
    <p>
      {!! Form::normalInput('titulo', 'Título', $errors) !!}
      {!! Form::normalInput('tags', 'Palabras claves (Separar por comas cada palabra)', $errors) !!}
      {!! Form::normalInput('fecha', 'Fecha', $errors) !!}
      {!! Form::normalCheckbox('destacado', 'Destacado', $errors) !!}
      {!! Form::normalCheckbox('mostrar', 'Mostrar', $errors) !!}

      @include('media::admin.fields.new-file-link-single', [
      'zone' => 'imagen'])

      {!! Form::normalTextarea('contenido', 'Contenido', $errors) !!}

    </p>
</div>
