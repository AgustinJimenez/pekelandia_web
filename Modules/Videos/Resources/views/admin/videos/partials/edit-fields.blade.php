<div class="box-body">
    <p>
    {!! Form::normalInput('titulo', 'Titulo', $errors, $videos) !!}
    {!! Form::normalCheckbox('mostrar', 'Mostrar', $errors, $videos) !!}
    {!! Form::normalInput('codigoembed', 'Codigo embed', $errors, $videos) !!}
    </p>
</div>
