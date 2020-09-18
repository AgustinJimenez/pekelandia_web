<div class="box-body">
    <p>
		{!! Form::normalInput('titulo', 'Título', $errors, $galeria) !!}
		{!! Form::normalInput('descripcion', 'Descripción', $errors, $galeria) !!}
		{!! Form::normalInput('vinculo', 'Vínculo', $errors, $galeria) !!}

        @include('media::admin.fields.file-link', [
        'entityClass' => 'Modules\\\\Anuncios\\\\Entities\\\\Galeria',
        'entityId' => $galeria->id,
        'zone' => 'imagen'
        ])

		{!! Form::normalInput('orden', 'Orden', $errors, $galeria) !!}
		{!! Form::normalCheckbox('mostrar', 'Mostrar', $errors, $galeria) !!}
    </p>
</div>
