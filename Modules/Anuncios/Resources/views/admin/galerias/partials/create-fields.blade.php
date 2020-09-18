<div class="box-body">
    <p>

    {!! Form::normalInput('titulo', 'Título', $errors) !!}
    {!! Form::normalInput('descripcion', 'Descripción', $errors) !!}
    {!! Form::normalInput('vinculo', 'Vínculo', $errors) !!}

      @include('media::admin.fields.new-file-link-single', [
      'zone' => 'imagen'])

      {!! Form::normalInput('orden', 'Orden', $errors) !!}
      {!! Form::normalCheckbox('mostrar', 'Mostrar', $errors) !!}

    </p>
</div>
