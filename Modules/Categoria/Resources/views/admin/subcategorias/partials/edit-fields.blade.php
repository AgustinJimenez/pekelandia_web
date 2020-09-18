<div class="box-body">
    <p>
        {!! Form::normalInput('nombre', 'Nombre', $errors, $subcategoria) !!}

        <label for='categoria_id'>Categorias</label>
        <select class="form-control" id="categoria_id" name="categoria_id">

            @foreach ($categorias as $categoria)

            	@if ($categoria->id == $subcategoria->categoria_id)

            	<option value="{{$categoria->id}}" selected="">{{$categoria->nombre}}</option>

            	@else

              	<option value="{{$categoria->id}}">{{$categoria->nombre}}</option>

              	@endif

            @endforeach

        </select>

        {!! Form::normalCheckbox('tiene_hijos', 'Tiene hijos', $errors, $subcategoria) !!}
    </p>
</div>
