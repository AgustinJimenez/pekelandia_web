<div class="box-body">
    <p>
        {!! Form::normalInput('nombre', 'Nombre', $errors) !!}
        {!! Form::normalSelect('subcategoria_id', 'Subcategorias', $errors, $subcategorias) !!}
    </p>
</div>
