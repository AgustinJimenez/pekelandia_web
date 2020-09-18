<div class="box-body">
    <p>
      {!! Form::normalInput('titulo', 'Título', $errors) !!}
      {!! Form::normalInput('tags', 'Palabras claves (Separar por comas cada palabra)', $errors) !!}
      {!! Form::normalCheckbox('mostrar', 'Mostrar', $errors) !!}

      @include('media::admin.fields.new-file-link-single', [
      'zone' => 'imagen'])
     
      {!! Form::normalInput('codigoembed', 'Video incrustado', $errors) !!}

      {!! Form::normalTextarea('contenido', 'Contenido', $errors) !!}
    </p>
</div>

<script type="text/javascript">
  
$(document).ready(function()
{
  $('label:contains("Imagen:")').text('Imagen a ser mostrada en el listado (352x230)');
});

</script>