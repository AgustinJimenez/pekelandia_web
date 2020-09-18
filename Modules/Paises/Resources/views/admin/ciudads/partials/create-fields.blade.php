<div class="box-body">
    <p>
        {!! Form::normalInput('nombre', 'Nombre', $errors) !!}
        {!! Form::normalSelect('pais_id', 'Paises', $errors, $paises) !!}
    </p>
</div>
