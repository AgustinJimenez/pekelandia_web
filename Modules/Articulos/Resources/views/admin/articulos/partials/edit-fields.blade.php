<div class="box-body">
    <p>
        {!! Form::normalInput('titulo', 'Título', $errors, $articulos) !!}
        {!! Form::normalInput('tags', 'Palabras claves (Separar por comas cada palabra)', $errors, $articulos) !!}
        {!! Form::normalCheckbox('mostrar', 'Mostrar', $errors, $articulos) !!}
        
        @include('media::admin.fields.file-link', [
        'entityClass' => 'Modules\\\\Articulos\\\\Entities\\\\Articulos',
        'entityId' => $articulos->id,
        'zone' => 'imagen'
        ])


        {!! Form::normalInput('codigoembed', 'Video incrustado', $errors, $articulos) !!}

        {!! Form::normalTextarea('contenido', 'Contenido', $errors, $articulos) !!}
    </p>

</div>

<script type="text/javascript">
    
$(document).ready(function()
{
    $('label:contains("Imagen:")').text('Imagen a ser mostrada en el listado (352x230)');
});

</script>