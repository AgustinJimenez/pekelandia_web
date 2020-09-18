<div class="box-body">
    <p>
    {!! Form::normalInput('titulo', 'Titulo', $errors, $revistas) !!}
    {!! Form::normalInput('numero', 'Numero', $errors, $revistas) !!}
    {!! Form::normalInput('year', 'Año', $errors, $revistas) !!}
    {!! Form::normalCheckbox('mostrar', 'Mostrar', $errors, $revistas) !!}
    {!! Form::normalInput('codigoembed', 'Codigo embed', $errors, $revistas) !!}
    </p>

    @include('media::admin.fields.file-link', [
        'entityClass' => 'Modules\\\\Revistas\\\\Entities\\\\Revistas',
        'entityId' => $revistas->id,
        'zone' => 'imagen'
      ])

</div>
