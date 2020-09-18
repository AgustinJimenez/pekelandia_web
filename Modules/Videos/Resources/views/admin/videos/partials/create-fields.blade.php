<div class="box-body">
    <p>
      {!! Form::normalInput('titulo', 'Titulo', $errors) !!}
      {!! Form::normalCheckbox('mostrar', 'Mostrar', $errors) !!}
      {!! Form::normalInput('codigoembed', 'Codigo embed', $errors) !!}
    </p>
</div>
