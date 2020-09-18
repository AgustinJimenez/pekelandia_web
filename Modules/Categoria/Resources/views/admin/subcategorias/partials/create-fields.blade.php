<div class="box-body">
    <p>
        {!! Form::normalInput('nombre', 'Nombre', $errors) !!}
        {!! Form::normalSelect('categoria_id', 'Categorias', $errors, $categorias) !!}
        {!! Form::normalCheckbox('tiene_hijos', 'Tiene hijos', $errors) !!}
    </p>
</div>
