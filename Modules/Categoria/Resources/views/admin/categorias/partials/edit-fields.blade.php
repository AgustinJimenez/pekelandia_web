<div class="box-body">
    <p>
        {!! Form::normalInput('nombre', 'Nombre', $errors, $categoria) !!}

		<div class="form-group">
		  <label for="orden" class="form-check-label">Orden:</label>
		    <input class="form-control" type="text" name="orden" id="orden" readonly="" value="{{$categoria->orden}}">
		</div>

		<div class="form-group">
		  <label for="menu" class="form-check-label">Menu:</label>
		    <input class="form-control" type="text" name="menu" id="menu" readonly="" value="{{$categoria->menu}}">
		</div>
    </p>
</div>
