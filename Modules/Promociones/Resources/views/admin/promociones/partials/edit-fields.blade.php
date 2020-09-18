<div class="box-body">
    <p>
        {!! Form::normalInput('titulo', 'Título', $errors, $promociones) !!}
        {!! Form::normalInput('tags', 'Palabras claves (Separar por comas cada palabra)', $errors, $promociones) !!}

        <label for='promocion-select'>Tipo Promoción</label>
            <select class="form-control" id="promocion-select" name="tipo">

            @if ($promociones->tipo == 'Oferta')
                <option value="Oferta" selected>Oferta</option>
                <option value="Descuento">Descuento</option>
                <option value="Sorteo">Sorteo</option>
            @elseif ($promociones->tipo == 'Descuento')
                <option value="Oferta">Oferta</option>
                <option value="Descuento" selected>Descuento</option>
                <option value="Sorteo">Sorteo</option>
            @else
                <option value="Oferta">Oferta</option>
                <option value="Descuento">Descuento</option>
                <option value="Sorteo" selected>Sorteo</option>
            @endif

            </select>

        {!! Form::normalCheckbox('mostrar', 'Mostrar', $errors, $promociones) !!}

        @include('media::admin.fields.file-link', [
        'entityClass' => 'Modules\\\\Promociones\\\\Entities\\\\Promociones',
        'entityId' => $promociones->id,
        'zone' => 'imagen'
        ])
        
        {!! Form::normalTextarea('contenido', 'Contenido', $errors, $promociones) !!}
    </p>

</div>
