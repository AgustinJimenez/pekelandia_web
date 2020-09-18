<div class="box-body">
    <p>
        {!! Form::normalInput('titulo', 'Título', $errors, $eventos) !!}
        {!! Form::normalInput('tags', 'Palabras claves (Separar por comas cada palabra)', $errors, $eventos) !!}

        <label for="fecha">Fecha</label>
        <input class="form-control" placeholder="Fecha" name="fecha" id="fecha" type="text" value="{{$eventos->fecha->format('Y-m-d') }}">

        {!! Form::normalCheckbox('destacado', 'Destacado', $errors, $eventos) !!}
        {!! Form::normalCheckbox('mostrar', 'Mostrar', $errors, $eventos) !!}

        @include('media::admin.fields.file-link', [
        'entityClass' => 'Modules\\\\Eventos\\\\Entities\\\\Eventos',
        'entityId' => $eventos->id,
        'zone' => 'imagen'
        ])
        
        {!! Form::normalTextarea('contenido', 'Contenido', $errors, $eventos) !!}
    </p>

</div>
