<div class="box-body">
    <p>
    {!! Form::normalInput('titulo', 'Título', $errors, $publicidad) !!}
    {!! Form::normalInput('descripcion', 'Descripción', $errors, $publicidad) !!}
    {!! Form::normalInput('plan', 'Plan', $errors, $publicidad) !!}

	<div class="form-group">
	  <label for="email" class="form-check-label">Orden:</label>
	    <input class="form-control" type="text" id="orden" name="orden" value="{{$publicidad->orden}}" readonly="" autocomplete="off">
	</div>

    </p>
</div>
